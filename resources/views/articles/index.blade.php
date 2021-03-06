@extends('layouts.app')

@section('content')
<div class="row">
	@forelse($articles as $article)

	<div class="col-sm-6  col-md-offset-3">
		<div class="panel panel-default">
		   <div class="panel-heading">
               <span><b>Vladimir</b></span>
               <span class="pull-right">
               	{{ $article->created_at->diffForHumans() }}
               </span>
			</div>
			<div class="panel-body">
				{{ $article->shortContent }}
				<a href="/articles/{{ $article->id }}">Read more</a>
			</div>
			<div class="panel-footer clearfix">
				@if($article->user_id == Auth::id())
                 <form action="/articles/{{ $article->id }}" method="POST" class="pull-right">
                 	{{ csrf_field() }}
                 	{{ method_field('DELETE') }}
                 	<button class="btn btn-danger btn-sm" style="margin-left: 10px;">Delete</button>
                 </form>
				@endif
					<i class="fa fa-heart pull-right"></i>
				</div>
		</div>
	</div>
	@empty
	No articles
	@endforelse
</div>
<div class="row">
<div class="col-sm-6  col-md-offset-3">
	{{ $articles->links() }}
</div>
</div>
@endsection