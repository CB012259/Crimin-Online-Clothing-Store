
@extends('layout.app')

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h1 class="text-2xl font-bold mb-4">Questions</h1>
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b">ID</th>
                            <th class="py-2 px-4 border-b">Email</th>
                            <th class="py-2 px-4 border-b">Question</th>
                            <th class="py-2 px-4 border-b">Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($questions as $question)
                            <tr>
                                <td class="py-2 px-4 border-b">{{ $question->id }}</td>
                                <td class="py-2 px-4 border-b">{{ $question->email }}</td>
                                <td class="py-2 px-4 border-b">{{ $question->question }}</td>
                                <td class="py-2 px-4 border-b">{{ $question->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<br><button onclick="history.back()" class="btn btn-primary">Back</button>

@endsection