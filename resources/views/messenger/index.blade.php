@extends('sb-admin/app')
@section('title', 'messages')
   
   @section('content')

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($message = Session::get('success'))
                        <div class="w-full px-5 py-4 mb-5 bg-success text-white">
                            {{ $message }}
                        </div>
                    @endif

                        <a href="/messages/create" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> New Pesan</a>
                        
                        <div class="col-span-9">
                            <table class="min-w-full leading-normal">
                                <thead class="border-b bg-gray-50">
                                    <th
                                        class="px-3 py-3 text-xl font-normal text-left text-gray-500 uppercase align-middle">
                                        Sender</th>
                                    <th
                                        class="px-3 py-3 text-xl font-normal text-left text-gray-500 uppercase align-middle">
                                        Subject</th>
                                    <th
                                        class="px-3 py-3 text-xl font-normal text-left text-gray-500 uppercase align-middle">
                                    </th>
                                </thead>
                                <tbody>
                                    @each('messenger.partials.thread', $threads, 'thread',
                                    'messenger.partials.no-threads')
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
@endsection



