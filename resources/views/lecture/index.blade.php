@extends("admin.admin_layout")
@section('content')

    <section id="input-style">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-content">
                        <div class="card-body">
                            <p>
                                الرئيسية/ المحاضرات الإلكترونية
                            </p>
                            <br>
                            <div class="row">

                                @if(count($errors) > 0)
                                    <div class="alert alert-danger">
                                        error <br>
                                        <ul>
                                            @foreach($errors->all() as $error)
                                                <li> {{ $error }} </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                @if($message = Session::get('success'))
                                    <div class="alert alert-success alert">
                                        <button type="button" class="close" data-dismiss="alert"> X </button>
                                        <strong> {{ $message }} </strong>
                                    </div>

                                @endif


                                    <button type="button" id="createNew"
                                            data-toggle="modal" data-target="#advertModal" class="btn gradient-purple-bliss" style="margin: 5px">إضافة</button>
                            </div>

                            <br>
                            <div class="row">

                                <div class="col-sm-12">
                                    <table id="tableData" class="table table-striped table-sm data-table">

                                        <thead>


                                        <tr>
                                            <th width="#10"> #</th>
                                            <th width="#10"> الاسم </th>
                                            <th width="#10"> المادة </th>
                                            <th width="#10"> الفصل </th>
                                            <th width="#10"> السنة </th>
                                            <th width="#20"> رابط مباشر </th>
                                            <th width="#20"> رابط درايف </th>
                                            <th width="#10">العمليات</th>

                                        </tr>

                                        </thead>

                                        <tbody>

                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade text-left" id="advertModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <label class="modal-title text-text-bold-600" id="modelheading"> إضافة ملف جديد  </label>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa fa-close"></i></span>

                    </button>
                </div>

                <form method="post" id="productForm" enctype="multipart/form-data">
                    <input type="hidden" name="_id" id="_id">
                    <div class="modal-body">
                        <div class="row">
                            @csrf

                        <div class="col-md-12"> <label> الاسم </label>
                            <div class="form-group">
                                <input type="text" name="name" id="name" placeholder="" class="form-control">
                            </div>
                        </div>
                            <div class="col-md-12"> <label> المادة </label>
                                <select name="subject_id" id="subject_id" class="form-control">
                                    @if(count($subject) > 0)
                                        @foreach($subject as $subjects)
                                            <option value="{{$subjects->subject_id}}">{{$subjects->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-md-12"> <label> الفصل </label>
                                <select name="season_id" id="season_id" class="form-control">
                                    @if(count($season) > 0)
                                        @foreach($season as $seasons)
                                            <option value="{{$seasons->season_id}}">{{$seasons->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-md-12"> <label> السنة </label>
                                <select name="year_id" id="year_id" class="form-control">
                                    @if(count($year) > 0)
                                        @foreach($year as $years)
                                            <option value="{{$years->year_id}}">{{$years->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-md-12"> <label> رابط مباشر </label>
                                <div class="form-group">
                                    <input type="text" name="direct_link" id="direct_link" placeholder="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12"> <label> رابط درايف </label>
                                <div class="form-group">
                                    <input type="text" name="drive_link" id="drive_link" placeholder="" class="form-control">
                                </div>
                            </div>

                    </div>


                    </div>
                    <div class="modal-footer">

                        <input type="hidden" name="operation" id="operation"/>
                        <input type="reset" class="btn bg-light-secondary" data-dismiss="modal" value="إغلاق">
                        <input type="submit" name="action" id="action" class="btn btn-primary" value="حفظ">
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection


@push('pageJs')

    <script type="text/javascript">

        $(function () {


            $.ajaxSetup({

                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                }

            });


            var table = $('#tableData').DataTable({
                "language": {
                    "processing": " جاري المعالجة",
                    "paginate": {
                        "first": "الأولى",
                        "last": "الأخيرة",
                        "next": "التالية",
                        "previous": "السابقة"
                    },
                    "search": "البحث :",
                    "loadingRecords": "جاري التحميل...",
                    "emptyTable": " لا توجد بيانات",
                    "info": "من إظهار _START_ إلى _END_ من _TOTAL_ النتائج",
                    "infoEmpty": "Showing 0 إلى 0 من 0 entries",
                    "lengthMenu": "إظهار _MENU_ البيانات",
                },
                processing: true,

                serverSide: true,

                ajax: "{{ route('lecture.index')}}",

                columns: [

                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name', name: 'name'},
                    {data: 'subject_id', name: 'subject_id'},
                    {data: 'study_year_id', name: 'study_year_id'},
                    {data: 'season_id', name: 'season_id'},
                    {data: 'direct_link', name: 'direct_link'},
                    {data: 'drive_link', name: 'drive_link'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},

                ]


            });



            $('#createNew').click(function () {

                $('#action').val("إضافة");

                $('#_id').val('');

                $('#productForm').trigger("reset");

                $('#modelHeading').html("  إضافة جديد  ");


            });


            $('body').on('click', '.editProduct', function () {
                var item=$(this);
                item.html("<i class='fa fa-spinner'></i>");
                var product_id = $(this).data("id");

                $.get("{{ route('lecture.index') }}" + '/' + product_id + '/edit', function (data) {
                    item.html("<i class='fa fa-edit'></i>");

                    $('#modelheading').html("تعديل الملف ");

                    $("#action").html("تعديل");
                    $("#action").val("تعديل");
                    $('#advertModal').modal('show');

                    $('#_id').val(data.id);

                    $('#name').val(data.name);
                    $('#subject_id').val(data.subject_id);
                    $('#study_year_id').val(data.study_year_id);
                    $('#season_id').val(data.season_id);
                    $('#direct_link').val(data.direct_link);
                    $('#drive_link').val(data.drive_link);

                })

            });


            $('#action').click(function (e) {

                e.preventDefault();

                $('#action').html('Sending..');


                $.ajax({

                    data: $('#productForm').serialize(),

                    url: "{{ route('lecture.store') }}",

                    type: "POST",

                    dataType: 'json',

                    success: function (data) {
                        $('#action').html('إضافة');


                        if(data.status == 200){
                            toastr.success('تم الحفظ بنجاح');
                            $('#productForm').trigger("reset");
                            $('#advertModal').modal("hide");
                            $(".modal-backdrop").hide();
                            table.draw();
                        }
                        else {
                            toastr.warning(data.success);

                        }


                    },

                    error: function (data) {

                        console.log('Error:', data);

                        $('#action').html('إضافة');

                    }

                });

            });
            $('#submit').click(function (e) {

                e.preventDefault();

                $(this).html('saving..');


                $.ajax({

                    data: $('#productEditForm').serialize(),

                    url: "{{ route('lecture.store') }}",

                    type: "POST",

                    dataType: 'json',

                    success: function (data) {
                        $('#action').html('   حفظ التعديلات &nbsp; <i class="fa fa-save"></i> ');


                        $('#productEditForm').trigger("reset");
                        $('#ajaxModel').modal('hide');

                        table.draw();

                        toastr.success("تم التعديل بنجاح");

                    },

                    error: function (data) {

                        console.log('Error:', data);
                        $('#ajaxModel').modal('hide');

                        $('#editBtn').html('Save changes &nbsp; <i class="fa fa-save"></i> ');

                    }

                });

            });


            $('body').on('click', '.deleteProduct', function () {

                var item=$(this);
                item.html("<i class='fa fa-spinner'></i>");

                var product_id = $(this).data("id");

                var co = confirm("  هل أنت متأكد من الحذف  !");
                if (!co) {
                    return;
                }


                $.ajax({

                    type: "DELETE",

                    url: "{{ route('lecture.store') }}" + '/' + product_id,

                    success: function (data) {

                        table.draw();
                        item.html("<i class='fa fa-trash-o'></i>");


                    },

                    error: function (data) {

                        console.log('خطأ:', data);

                    }

                });

            });





        });

    </script>

@endpush
