@extends("admin.admin_layout")
@section('content')

    <section id="input-style">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-content">
                        <div class="card-body">
                            <p>
                                الرئيسية/ سلالم امتحانية
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
                                            <th> #</th>
                                            <th> اسم المادة </th>
                                            <th> الملف </th>
                                            <th> الصلاحية </th>
                                            <th> التاريخ </th>
                                            <th >العمليات</th>

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

                        <div class="col-md-12"> <label> اسم المادة </label>
                            <div class="form-group">
                                <input type="text" name="name" id="name" placeholder="" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12"> <label> الملف </label>
                            <div class="form-group">
                                <input type="file" name="file" id="file" placeholder="" class="form-control">
                            </div>
                        </div>
                            <div class="col-md-12"> <label> التاريخ </label>
                                <div class="form-group">
                                    <input type="date" name="date" id="date" placeholder="" class="form-control">
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

                ajax: "{{ route('result_exam.index')}}",

                columns: [

                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},

                    {data: 'name', name: 'name'},
                    {data: 'file', name: 'file'},
                    {data: 'date', name: 'date'},

                    {data: 'action', name: 'action', orderable: false, searchable: false},

                ]

            });



            $('#createNew').click(function () {

                $('#action').val("إضافة");

                $('#_id').val('');

                $('#productForm').trigger("reset");

                $('#modelheading').html("  إضافة بيانات ");


            });




            $('body').on('click', '.editProduct', function () {

                var item = $(this);
                var product_id = $(this).data('id');
                item.html("<i class='fa fa-spinner'> </i>");

                $.get("{{ route('result_exam.index') }}" + '/' + product_id + '/edit', function (data) {

                    item.html("<i class='fa fa-edit'> </i>");
                    $('#modelheading').html("تعديل البيانات ");

                    $("#action").html("تعديل");
                    $("#action").val("تعديل");
                    $('#advertModal').modal('show');

                    $('#_id').val(data.id);

                    $('#name').val(data.name);
                    $('#file').val(data.file);
                    $('#date').val(data.date);

                })

            });


            $('#action').click(function (e) {

                e.preventDefault();

                $('#action').html('Sending..');

                var product_id = $("_id").val();

                $.ajax({


                    data: $('#productForm').serialize(),
                    url: "{{ route('result_exam.store') }}" ,

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

                    url: "{{ route('result_exam.store') }}" + '/' + product_id,

                    success: function (data) {

                        item.html("<i class='fa fa-trash-o'></i>");
                        toastr.error("تم الحذف بنجاح");
                        table.draw();

                    },

                    error: function (data) {
                        item.html("<i class='fa fa-trash'> </i>");
                        toastr.error("حدث خطأ ");
                        console.log('خطأ:', data);

                    }

                });

            });


        });

    </script>
@endpush
