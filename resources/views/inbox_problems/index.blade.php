@extends("admin.admin_layout")
@section('content')

    <section id="input-style">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-content">
                        <div class="card-body">
                            <p>
                                الرئيسية/ الشكاوي
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


{{--                                    <button type="button" id="createNew" data-toggle="modal" data-target="#advertModal" class="btn gradient-purple-bliss" style="margin: 5px">إضافة</button>--}}
                            </div>

                            <br>
                            <div class="row">

                                <div class="col-sm-12">
                                    <table id="tableData" class="table table-striped table-sm data-table">

                                        <thead>


                                        <tr>
                                            <th> #</th>
                                            <th> نص الشكوى </th>
                                            <th> التاريخ </th>
                                            <th> حالة الشكوى </th>
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

                ajax: "{{ route('inbox_problems.index')}}",

                columns: [

                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},

                    {data: 'problems', name: 'problems'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'check', name: 'check'},

                    {data: 'action', name: 'action', orderable: false, searchable: false},

                ]

            });



            $('body').on('click', '.checkProduct', function () {

                var item=$(this);
                item.html("<i class='fa fa-spinner'></i>");

                var product_id = $(this).data("id");

                $.get("{{ route('inbox_problems.store') }}" + '/' + product_id + '/edit', function (data) {

                    $('#_id').val(data.id);
                    table.draw();
                    item.html("<i class='fa fa-success'></i>");

                })

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

                    url: "{{ route('inbox_problems.store') }}" + '/' + product_id,

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
