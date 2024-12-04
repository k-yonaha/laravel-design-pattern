<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
</head>
<body>
    <h1>Posts</h1>
    <ul>
        @foreach ($posts as $post)
            <li>
                {{ $post->title }} ({{ $post->is_published ? '公開' : '非公開' }})
                <form action="{{ route('posts.updateStatus', $post->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="is_published" value="{{ $post->is_published ? 0 : 1 }}">
                    <button type="submit">
                        {{ $post->is_published ? '非公開にする' : '公開する' }}
                    </button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>