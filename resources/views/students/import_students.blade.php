@extends("admin.admin_layout")
@section('content')

    <section id="input-style">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-content">
                        <div class="card-body">
                            <p>
                                الرئيسية/ بيانات الطلاب
                            </p>
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

                                <form method="post" enctype="multipart/form-data" action="{{route('students.import')}}">

                                    {{ csrf_field() }}
                                    <input type="file" name="select_file" class="btn gradient-purple-bliss" style="margin: 5px"> </input>
                                    <input type="submit" name="upload" class="btn gradient-purple-bliss" value="تحميل الملف" style="padding:10px; margin: 5px"> </input>

                                </form>

                                <button type="button" id="createNew"
                                        data-toggle="modal" data-target="#advertModal" class="btn gradient-purple-bliss" style="margin: 5px">إضافة</button>
                            </div>


                            <div class="row">

                                <div class="col-sm-12">
                                    <table id="tableData" class="table table-striped table-sm data-table">

                                        <thead>


                                        <tr>
                                            <th width="10%"> #</th>
                                            <th width="10%">الرقم الجامعي</th>
                                            <th width="10%"> اسم الطالب </th>
                                            <th width="10%"> الرقم الوطني </th>
                                            <th width="10%"> رقم الهاتف </th>

                                            <th width="10%" >العمليات</th>

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
                    <label class="modal-title text-text-bold-600" id="modelheading">تعديل بيانات  </label>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa fa-close"></i></span>

                    </button>
                </div>
                <form method="post" id="productForm" enctype="multipart/form-data">
                    <input type="hidden" name="_id" id="_id">
                    <div class="modal-body">
                        <div class="row">
                            @csrf

                            <div class="col-md-6"> <label> الرقم الجامعي </label>
                                <div class="form-group">
                                    <input type="number" name="univ_id" id="univ_id" placeholder="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6"> <label> اسم الطالب </label>
                                <div class="form-group">
                                    <input type="text" name="name" id="name" placeholder="" class="form-control">
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6"> <label> الرقم الوطني </label>
                                <div class="form-group">
                                    <input type="text" name="national_id" id="national_id" placeholder="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6"> <label> رقم الهاتف </label>
                                <div class="form-group">
                                    <input type="text" name="mobile" id="mobile" placeholder="" class="form-control">
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
                destroy:true,
                processing: true,

                serverSide: true,
                stateSave:true,

                ajax: "{{ route('students.index')}}",

                columns: [

                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},

                    {data: 'univ_id', name: 'univ_id'},
                    {data: 'name', name: 'name'},
                    {data: 'national_id', name: 'national_id'},
                    {data: 'mobile', name: 'mobile'},

                    {data: 'action', name: 'action', orderable: false, searchable: false},

                ]

            });



            $('#createNew').click(function () {

                $('#action').val("إضافة");

                $('#_id').val('');

                $('#productForm').trigger("reset");

                $('#modelheading').html("  إضافة بيانات ");


            });




            $('body').on('click', '.deleteStudent', function () {

                var item = $(this);
                var product_id = $(this).data("id");

                item.html("<i class='fa fa-spinner'> </i>");

                var co = confirm("  هل أنت متأكد من الحذف  !");
                if (!co) {
                    item.html("<i class='fa fa-trash'> </i>");
                    return;
                }

                $.ajax({

                    type: "DELETE",

                    url: "{{ route('students.store') }}" + '/' + product_id,

                    success: function (data) {
                        item.html("<i class='fa fa-trash'> </i>");
                        toastr.error("تم الحذف بنجاح");
                        table.draw(false);

                    },

                    error: function (data) {
                        item.html("<i class='fa fa-trash'> </i>");
                        toastr.error("حدث خطأ ");
                        console.log('خطأ:', data);

                    }

                });

            });

            $('body').on('click', '.editStudent', function () {

                var item = $(this);
                var product_id = $(this).data('id');
                item.html("<i class='fa fa-spinner'> </i>");

                $.get("{{ route('students.index') }}" + '/' + product_id + '/edit', function (data) {

                    item.html("<i class='fa fa-edit'> </i>");
                    $('#modelheading').html("تعديل البيانات ");

                    $("#action").html("تعديل");
                    $("#action").val("تعديل");
                    $('#advertModal').modal('show');

                    $('#_id').val(data.id);

                    $('#name').val(data.name);
                    $('#univ_id').val(data.univ_id);
                    $('#national_id').val(data.national_id);
                    $('#mobile').val(data.mobile);

                })

            });


            $('#action').click(function (e) {

                e.preventDefault();

                $(this).html('Sending..');

                var product_id = $("_id").val();

                $.ajax({


                    data: $('#productForm').serialize(),
                    url: "{{ route('students.store') }}" ,

                    type: "POST",

                    dataType: 'json',

                    success: function (data) {
                        if(data.status==200) {


                            $('#action').html('إضافة');

                            $('#productForm').trigger("reset");
                            $('#advertModal').modal("hide");
                            $(".modal-backdrop").hide();
                            toastr.success('تم الحفظ بنجاح');
                            table.draw(false);
                        }
                        else{
                            toastr.warning(data.success);
                        }


                    },

                    error: function (data) {

                        console.log('Error:', data);

                        $('#action').html('إضافة');

                    }

                });

            });


        });

    </script>
@endpush