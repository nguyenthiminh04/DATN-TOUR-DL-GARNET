@foreach($comments as $comment)
    <div style="margin-left: {{ $comment->parent_id ? '20px' : '0' }}">
        <strong>
            @if($comment->user)
                {{ $comment->user->name }}
            @elseif($comment->anonymous_name)
                {{ $comment->anonymous_name }}
            @else
                Ẩn danh
            @endif
        </strong>
        <p>{{ $comment->content }}</p>

        <!-- Form trả lời -->
        <form method="POST" action="{{ route('posts.comment', $tour->id) }}">
            @csrf
            <input type="hidden" name="parent_id" value="{{ $comment->id }}">
            @if(!auth()->check())
                <div>
                    <label for="anonymous_name">Tên của bạn:</label>
                    <input type="text" name="anonymous_name" placeholder="Tên của bạn">
                </div>
            @endif
            <textarea name="content" rows="2" placeholder="Trả lời bình luận này" required></textarea>
            <button type="submit">Trả lời</button>
        </form>

        <!-- Hiển thị bình luận con -->
        @if($comment->children->count())
            @include('client.tour.comment', ['comments' => $comment->children])
        @endif
    </div>
@endforeach
