@extends('layout.master-template')

@section('content')
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tables</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Resto</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name Resto</th>
                        <th>Title Document</th>
                        <th>Description</th>
                        <th>Tahun</th>
                        <th>Created</th>
                    </tr>
                </thead>
                <tbody>

                @foreach ($document as $row)
                    <tr>
                    <th>{{ $document->firstItem() + $loop->index }}</th>
                        <th>{{$row->name_resto}}</th>
                        <th>{{$row->title_document}}</th>
                        <th>{{$row->description}}</th>
                        <th>{{$row->tahun}}</th>
                        <th>{{$row->created_at !== null ?$row->created_at->format('d-m-Y') :"-"}}</th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
@endsection
