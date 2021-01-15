@extends("admin.admin_layout")
@section('content')

    <section id="input-style">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-content">
                        <div class="card-body">
                            <p>
                                الرئيسية/ استيراد وعرض قوائم الطلاب
                            </p>
                            <div class="row">
                                <button type="button" id="createNewProduct"
                                        data-toggle="modal" data-target="#advertModal" class="btn gradient-purple-bliss">إضافة</button>

                            </div>

                            <div class="row">

                                <div class="col-sm-12">
                                    <table id="tableData" class="table table-striped table-sm data-table">

                                        <thead>


                                        <tr>
                                            <th> #</th>
                                            <th>  عنوان الخبر    </th>
                                            <th> التفاصيل  </th>
                                            <th> الصورة   </th>
                                            <th> المراسل   </th>

                                            <th width="15%">العمليات</th>
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
                    <label class="modal-title text-text-bold-600" id="modelheading">تعديل بيانات الخبر </label>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa fa-close"></i></span>

                    </button>
                </div>
                <form method="post" id="productForm" enctype="multipart/form-data">

                    <input type="hidden" name="_id" id="_id">
                    <div class="modal-body">

                        <label> عنوان الخبر   </label>
                        <input type="text" name="name" id="name" class="form-control"/>

                        <br/> <label> التفاصيل  </label>
                        <input type="text" name="details" id="details" class="form-control">

                        <br/>
                        <label for="roundText">   صورة     </label>
                        <div class="needsclick dropzone" id="image" name="image"> </div>

                        <br/>
                        <label> المراسل  </label>
                        <input type="text" name="morasel_id" id="morasel_id" class="form-control">


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


    {{--<script type="text/javascript">--}}

        {{--$(function () {--}}


            {{--$.ajaxSetup({--}}

                {{--headers: {--}}

                    {{--'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}

                {{--}--}}

            {{--});--}}


            {{--var table = $('#tableData').DataTable({--}}
                {{--"language": {--}}
                    {{--"processing": " جاري المعالجة",--}}
                    {{--"paginate": {--}}
                        {{--"first": "الأولى",--}}
                        {{--"last": "الأخيرة",--}}
                        {{--"next": "التالية",--}}
                        {{--"previous": "السابقة"--}}
                    {{--},--}}
                    {{--"search": "البحث :",--}}
                    {{--"loadingRecords": "جاري التحميل...",--}}
                    {{--"emptyTable": " لا توجد بيانات",--}}
                    {{--"info": "من إظهار _START_ إلى _END_ من _TOTAL_ النتائج",--}}
                    {{--"infoEmpty": "Showing 0 إلى 0 من 0 entries",--}}
                    {{--"lengthMenu": "إظهار _MENU_ البيانات",--}}
                {{--},--}}
                {{--processing: true,--}}

                {{--serverSide: true,--}}

                {{--ajax: "{{ route('morasel_news_requests')}}",--}}

                {{--columns: [--}}

                    {{--{data: 'DT_RowIndex', name: 'DT_RowIndex'},--}}

                    {{--{data: 'title', name: 'title'},--}}
                    {{--{data: 'details', name: 'details'},--}}
                    {{--{data: 'image', name: 'image'},--}}
                    {{--{data: 'morasel_id', name: 'morasel_id'},--}}

                    {{--{data: 'action', name: 'action', orderable: false, searchable: false},--}}

                {{--]--}}

            {{--});--}}



            {{--$('body').on('click', '.accept', function () {--}}


                {{--var product_id = $(this).data("id");--}}

                {{--var co = confirm("  هل أنت متأكد من قبول الخبر  !");--}}
                {{--if (!co) {--}}
                    {{--return;--}}
                {{--}--}}


                {{--$.ajax({--}}

                    {{--type: "POST",--}}

                    {{--url: "{{ route('new.agree') }}/" + product_id  ,--}}
                    {{--// data:{--}}
                    {{--//     "_id":product_id,--}}
                    {{--//     "status":1,--}}
                    {{--//     "_token":$("input[name=_token]").val()--}}
                    {{--// },--}}

                    {{--success: function (data) {--}}

                        {{--table.draw();--}}

                    {{--},--}}

                    {{--error: function (data) {--}}

                        {{--console.log('خطأ:', data);--}}

                    {{--}--}}

                {{--});--}}

            {{--});--}}




        {{--});--}}

    {{--</script>--}}
@endpush
