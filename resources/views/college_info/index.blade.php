@extends("admin.admin_layout")
@section('content')

    <section id="input-style">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-content">
                        <div class="card-body">
                            <p>
                                الرئيسية/ قرارات الجامعة
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
                                            <th> الاسم </th>
                                            <th> الموبايل </th>
                                            <th> الصلاحية </th>
                                            <th> تاريخ البدء </th>
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
                    <label class="modal-title text-text-bold-600" id="modelheading"> إضافة موظف جديد  </label>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa fa-close"></i></span>

                    </button>
                </div>

                <form method="post" id="productForm" enctype="multipart/form-data">
                    <input type="hidden" name="_id" id="_id">
                    <div class="modal-body">
                        <div class="row">
                            @csrf

                        <div class="col-md-6"> <label> الاسم </label>
                            <div class="form-group">
                                <input type="text" name="name" id="name" placeholder="" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6"> <label> الموبايل </label>
                            <div class="form-group">
                                <input type="number" name="mobile" id="mobile" placeholder="" class="form-control">
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-6"> <label> الصلاحية </label>
                            <div class="form-group">
                                <input type="number" name="rule" id="rule" placeholder="" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6"> <label>  تاريخ البدء </label>
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


{{--    <script type="text/javascript">--}}

{{--        $(function () {--}}


{{--            $.ajaxSetup({--}}

{{--                headers: {--}}

{{--                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}

{{--                }--}}

{{--            });--}}


{{--            var table = $('#tableData').DataTable({--}}
{{--                "language": {--}}
{{--                    "processing": " جاري المعالجة",--}}
{{--                    "paginate": {--}}
{{--                        "first": "الأولى",--}}
{{--                        "last": "الأخيرة",--}}
{{--                        "next": "التالية",--}}
{{--                        "previous": "السابقة"--}}
{{--                    },--}}
{{--                    "search": "البحث :",--}}
{{--                    "loadingRecords": "جاري التحميل...",--}}
{{--                    "emptyTable": " لا توجد بيانات",--}}
{{--                    "info": "من إظهار _START_ إلى _END_ من _TOTAL_ النتائج",--}}
{{--                    "infoEmpty": "Showing 0 إلى 0 من 0 entries",--}}
{{--                    "lengthMenu": "إظهار _MENU_ البيانات",--}}
{{--                },--}}
{{--                processing: true,--}}

{{--                serverSide: true,--}}

{{--                ajax: "{{ route('employees.index')}}",--}}

{{--                columns: [--}}

{{--                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},--}}

{{--                    {data: 'name', name: 'name'},--}}
{{--                    {data: 'mobile', name: 'mobile'},--}}
{{--                    {data: 'rule', name: 'rule'},--}}
{{--                    {data: 'date', name: 'date'},--}}

{{--                    {data: 'action', name: 'action', orderable: false, searchable: false},--}}

{{--                ]--}}

{{--            });--}}



{{--            $('body').on('click', '.accept', function () {--}}


{{--                var product_id = $(this).data("id");--}}

{{--                var co = confirm("  هل أنت متأكد من قبول الخبر  !");--}}
{{--                if (!co) {--}}
{{--                    return;--}}
{{--                }--}}


{{--                $.ajax({--}}

{{--                    type: "POST",--}}

{{--                    url: "{{ route('employees.store') }}/" + product_id  ,--}}
{{--                    // data:{--}}
{{--                    //     "_id":product_id,--}}
{{--                    //     "status":1,--}}
{{--                    //     "_token":$("input[name=_token]").val()--}}
{{--                    // },--}}

{{--                    success: function (data) {--}}

{{--                        table.draw();--}}

{{--                    },--}}

{{--                    error: function (data) {--}}

{{--                        console.log('خطأ:', data);--}}

{{--                    }--}}

{{--                });--}}

{{--            });--}}




{{--        });--}}

{{--    </script>--}}
@endpush
