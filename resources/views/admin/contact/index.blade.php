@extends('admin.layouts.index')
 
@section('title', 'Liên hệ của khách hàng')

@section('content')

<nav class="flex" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
        <li class="inline-flex items-center">
            <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                </svg>
            </a>
        </li>
        <li aria-current="page">
            <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2">Liên hệ của khách hàng</span>
            </div>
        </li>
    </ol>
</nav>

@if($errors->any())
<ul>
    @foreach( $errors->all() as $error)
    <li>
        <span class="text-red-300">{{$error}}</span>
    </li>
    @endforeach
</ul>
@endif

<section class="bg-gray-50 py-4 sm:py-5 mt-5">
    <div class="px-4 mx-auto max-w-screen-2xl">
        <div class="relative overflow-hidden bg-white shadow-md sm:rounded-lg">
            <div class="flex flex-col px-4 py-3 space-y-3 lg:flex-row lg:items-center lg:justify-between lg:space-y-0 lg:space-x-4">
                <div class="flex items-center flex-1 space-x-4">
                    <h2 class="text-black text-2xl font-semibold">Liên hệ của khách hàng</h2>
                </div>

                <!-- Search form -->
                {{-- @include('admin.contact.partials.search-contact-form') --}}
                <button id="reset-filter" data-url={{route('admin.contact')}} class="flex items-center gap-2 group">
                    <span class="text-xs text-red-400 group-hover:text-red-600">Reset filter</span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="fill-red-400 group-hover:fill-red-600 w-5 h-5">
                        <path d="M142.9 142.9c62.2-62.2 162.7-62.5 225.3-1L327 183c-6.9 6.9-8.9 17.2-5.2 26.2s12.5 14.8 22.2 14.8H463.5c0 0 0 0 0 0H472c13.3 0 24-10.7 24-24V72c0-9.7-5.8-18.5-14.8-22.2s-19.3-1.7-26.2 5.2L413.4 96.6c-87.6-86.5-228.7-86.2-315.8 1C73.2 122 55.6 150.7 44.8 181.4c-5.9 16.7 2.9 34.9 19.5 40.8s34.9-2.9 40.8-19.5c7.7-21.8 20.2-42.3 37.8-59.8zM16 312v7.6 .7V440c0 9.7 5.8 18.5 14.8 22.2s19.3 1.7 26.2-5.2l41.6-41.6c87.6 86.5 228.7 86.2 315.8-1c24.4-24.4 42.1-53.1 52.9-83.7c5.9-16.7-2.9-34.9-19.5-40.8s-34.9 2.9-40.8 19.5c-7.7 21.8-20.2 42.3-37.8 59.8c-62.2 62.2-162.7 62.5-225.3 1L185 329c6.9-6.9 8.9-17.2 5.2-26.2s-12.5-14.8-22.2-14.8H48.4h-.7H40c-13.3 0-24 10.7-24 24z"/>
                    </svg>
                </button>

            </div>
            <!-- --------- -->
            <div class="overflow-x-auto">
                <div class="flex flex-wrap items-center gap-4 justify-end px-4 mb-4">
                    <div class="grow">
                        <label for="" class="text-xs font-semibold text-blue-400">Tìm kiếm tên khách hàng</label>
                        <div class="relative w-full"> 
                            <input type="text" id="keyword-search" name="keyword-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-4 p-2.5" placeholder="Nhập từ khóa ..." required value="{{$keyword == 'none' ? '' : $keyword }}" />
                        </div>
                    </div>
                    <div class="grow">
                        <label for="filter-created" class="text-xs font-semibold text-blue-400">Lọc theo ngày gửi</label>
                        <div class="relative max-w-sm">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                </svg>
                            </div>
                            <input id="filter-created" name="filter-created" datepicker type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5" placeholder="Chọn ngày" value="{{ $created == 'all' ? '' : $created }}">
                        </div>
                    </div>
                    <div class="grow">
                        <label for="" class="text-xs font-semibold text-blue-400">Lọc theo trạng thái</label>
                        <select id="filter-soft" name="filter-soft" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option value="all" {{isset($_GET['soft']) && ($_GET['soft']=='all')?'selected': ''}}>
                                Tất cả
                            </option>
                            <option value="new" {{isset($_GET['soft']) && ($_GET['soft']=='new')?'selected': ''}}>
                                {{config('global.contact_status.new')}}
                            </option>
                            <option value="unread" {{isset($_GET['soft']) && ($_GET['soft']=='unread')?'selected': ''}}>
                                {{config('global.contact_status.unread')}}
                            </option>
                            <option value="read" {{isset($_GET['soft']) && ($_GET['soft']=='read')?'selected': ''}}>
                                {{config('global.contact_status.read')}}
                            </option>
                        </select>
                    </div>
                    <div class="">
                        <label for="" class="text-xs font-semibold text-blue-400">Lọc</label>
                        <div class="relative max-w-sm">
                            <button id="filter-btn" type="button" class="p-2 inset-y-0 end-0 flex items-center justify-center pe-3 rounded-lg border border-blue-500">
                                <svg class="w-6 h-6 fill-blue-500 hover:fill-blue-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path d="M3.9 54.9C10.5 40.9 24.5 32 40 32H472c15.5 0 29.5 8.9 36.1 22.9s4.6 30.5-5.2 42.5L320 320.9V448c0 12.1-6.8 23.2-17.7 28.6s-23.8 4.3-33.5-3l-64-48c-8.1-6-12.8-15.5-12.8-25.6V320.9L9 97.3C-.7 85.4-2.8 68.8 3.9 54.9z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-4 py-3">
                                Tên khách hàng
                            </th>
                            <th scope="col" class="px-4 py-3">
                                Email
                            </th>
                            <th scope="col" class="px-4 py-3">
                                Số điện thoại
                            </th>
                            <th scope="col" class="px-4 py-3">
                                Ngày gửi
                            </th>
                            <th scope="col" class="px-4 py-3">
                                Ngày cập nhật
                            </th>
                            <th scope="col" class="px-4 py-3">
                                Trạng thái
                            </th>
                            <th scope="col" class="px-4 py-3">
                                Đã đọc
                            </th>
                            <th scope="col" class="px-4 py-3"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($contacts) && count($contacts) != 0)
                            @foreach($contacts as $contact)
                            <tr class="bg-white border-b">
                                <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $contact->name }}
                                </th>
                                <td class="px-4 py-3">
                                    {{ $contact->email }}
                                </td>
                                <td class="px-4 py-3">
                                    {{ $contact->phone }}
                                </td>
                                <td class="px-4 py-3 w-max">
                                    {{ $contact->created_at }}
                                </td>
                                <td class="px-4 py-3">
                                    {{ $contact->updated_at }}
                                </td>
                                <td class="px-4 py-3">
                                    @if($contact->status == config('global.contact_status.new'))
                                        <span class="block w-max text-xs text-white bg-red-500 px-2 py-1 rounded">{{ $contact->status }}</span>
                                    @endif
                                    @if($contact->status == config('global.contact_status.unread'))
                                        <span class="block w-max text-xs text-white bg-yellow-500 px-2 py-1 rounded">{{ $contact->status }}</span>
                                    @endif
                                    @if($contact->status == config('global.contact_status.read'))
                                        <span class="block w-max text-xs text-white bg-blue-500 px-2 py-1 rounded">{{ $contact->status }}</span>
                                    @endif
                                    
                                </td>
                                <td class="px-4 py-3">
                                    @if($contact->status != config('global.contact_status.read'))
                                        <form data-id="{{ $contact->id }}" data-action="{{ route('admin.contact.update') }}" class="form-read-contact">
                                            <input id="checked-checkbox-{{$contact->id}}" type="checkbox" value="read" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 hover:bg-blue-500 hover:border-blue-500 cursor-pointer">
                                        </form>
                                    @endif
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center justify-end gap-4">
                                        <!-- View contact -->
                                        @include('admin.contact.partials.view-contact-form')
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="p-4">
                {{ $contacts->links() }}
            </div>
        </div>
    </div>
</section>
<!--======================
Form filter Start
==========================-->
<form id="formFilter" method="GET" enctype="multipart/form-data">
    <input type="hidden" name="page" id="page" value="{{$page}}" />
    <input type="hidden" name="soft" id="soft" value="{{$soft}}" />
    <input type="hidden" name="created" id="created" value="{{$created}}" />
    <input type="hidden" name="keyword" id="keyword" value="{{$keyword}}" />
</form>
<!--======================
Form filter End
==========================-->
<script>
    $(document).ready(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let formReadContacts = $('.form-read-contact');
        $.each(formReadContacts, function() {
            $(this).change(function(e) {
                e.preventDefault();
                let url = $(this).data('action');
                let idInput = "#checked-checkbox-" + $(this).data('id');
                let status = $(idInput).is(":checked") ? $(idInput).val() : 'null';
                let data = {
                    id:  $(this).data('id'),
                    status: status,
                    created: $('#created').val(),
                    keyword: $('#keyword').val()
                }

                $.ajax({
                    type: 'POST',
                    url: url,
                    data: data,
                    success: function(results) {
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: results,
                            showConfirmButton: false,
                            timer: 1500,
                        });
                        setTimeout(function(){
                            location.reload();
                        },2000);
                    },
                    error: function(results) {
                        Swal.fire({
                            title: results.responseText,
                            icon: "error",
                        });
                    },
                });

            });
        });

        


        jQuery.fn.extend({
            getPage: function() {
                let curentPage = <?php echo isset($_GET['page'])?$_GET['page']:1; ?>;
                return curentPage;
            },

            submitFilter: function() {
                $('#page').val(1);
                $('#formFilter').submit();
            },
        });

        $('#reset-filter').on("click", function(e) {
            e.preventDefault();
            $('#page').val(1);
            $('#soft').val('all');
            $('#created').val('all');

            $(location).attr('href', $(this).data('url'));
            $(location).reload();
        });
        
        $('#filter-soft').on("change", function(e) {
            let filter = $(this).val();
            $('#soft').val(filter);
            
            // $(this).submitFilter();
        });

        $('#filter-btn').on("click", function(e) {
            let filterCreated = $('#filter-created').val() == '' ? 'all' : $('#filter-created').val();
            $('#created').val(filterCreated);

            let filterKeyword = $('#keyword-search').val() == '' ? 'none' : $('#keyword-search').val();
            $('#keyword').val(filterKeyword);

            $(this).submitFilter();
        });

        let page = $(this).getPage();
        $('#page').val(page);

        let pageUrl = "?page=";
        let softUrl = "&soft=";
        let createdUrl = "&created=";
        let keywordUrl = "&keyword=";

        $('.link-page').each(function(index, url) {
            url += softUrl + $('#soft').val() + createdUrl + $('#created').val() + keywordUrl + $('#keyword').val();
            $(this).attr("href", url);
        });

        if($('#link-next').attr('href') != null) {
            $('#link-next').attr('href', pageUrl + (page+1) +  softUrl + $('#soft').val());
        }

        if($('#link-previous').attr('href') != null) {
            $('#link-previous').attr('href', pageUrl + (page-1) +  softUrl + $('#soft').val());
        } 
    });

</script>
@endsection