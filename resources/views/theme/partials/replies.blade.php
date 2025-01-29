@foreach($comments as $reply)
    <div class="mx-5 card my-2">
        <div class="card-body">
            <p>{{ $reply->message }}</p>

            <!-- Reply Form -->
            <form method="post" action="{{ route('comment.reply.store') }}">
                @csrf

                <input type="hidden" name="parent_id" value="{{ $reply->id }}">

                <input type="text" class="form-control" name="name"
                    placeholder="Enter Name" onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Enter Name'">
                <x-input-error :messages="$errors->get('name')" class="mx-5 mt-1 text-danger" />

                <textarea name="reply" class="form-control my-2" cols="50" rows="1" placeholder = 'Enter Reply'"></textarea>
                <x-input-error :messages="$errors->get('reply')" class="mx-5 mt-1 text-danger" />

                <button type="submit" class="btn btn-outline-primary"> Reply </button>
            </form>

            <!-- Recursive Replies -->
            @include('theme.partials.replies', ['comments' => $reply->replies])
        </div>
    </div>
@endforeach
