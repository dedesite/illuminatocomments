<h3 class="page-product-heading" id="mymodcomments-content-tab">{{Lang::get('comments::front.title')}}</h3>

<div class="rte">
@foreach($comments as $key => $comment)
	<div class="mymodcomments-comment">
		<div>{{$comment->firstname}} {{$comment->lastname}}. <small>{{$comment->created_at}}</small></div>
		<div class="star-rating"><i class="glyphicon glyphicon-star"></i> <strong>{{Lang::get('comments::front.grade')}} :</strong></div> <input value="{{$comment->grade}}" type="number" class="rating" min="0" max="5" step="1" data-size="xs" />
		<div><i class="glyphicon glyphicon-comment"></i> <strong>{{Lang::get('comments::front.comments')}} #{{$comment->id_illuminato_comments}}:</strong> {{$comment->comment}}</div>
	</div>
    <hr />
@endforeach
</div>

@if($enable_grades || $enable_comments)
<div class="rte">
	<form action="" method="POST" id="comment-form">

		<div class="form-group">
			<label for="firstname">{{Lang::get('comments::front.firstname')}}</label>
			<div class="row"><div class="col-xs-4">
                <input type=”text” name="firstname" id="firstname" class="form-control" />
            </div></div>
        </div>
		<div class="form-group">
            <label for="lastname">{{Lang::get('comments::front.lastname')}}</label>
			<div class="row"><div class="col-xs-4">
                <input type=”text” name="lastname" id="lastname" class="form-control" />
            </div></div>
        </div>
		<div class="form-group">
            <label for="email">{{Lang::get('comments::front.email')}}</label>
			<div class="row"><div class="col-xs-4">
				<input type=”email” name="email" id="email" class="form-control" />
			</div></div>
        </div>

        @if($enable_grades)
            <div class="form-group">
                <label for="grade">{{Lang::get('comments::front.grade')}}</label>
                <div class="row">
                    <div class="col-xs-4" id="grade-tab">
						<input id="grade" name="grade" value="0" type="number" class="rating" min="0" max="5" step="1" data-size="sm" >
				    </div>
			    </div>
		    </div>
        @endif
        @if($enable_comments)
			<div class="form-group">
				<label for="comment">{{Lang::get('comments::front.comments')}}</label>
				<textarea name="comment" id="comment" class="form-control"></textarea>
		    </div>
        @endif
		<div class="submit">
			<button type="submit" name="mymod_pc_submit_comment" class="button btn btn-default button-medium"><span>{{Lang::get('comments::front.send')}}<i class="icon-chevron-right right"></i></span></button>
		</div>
	</form>
</div>
@endif