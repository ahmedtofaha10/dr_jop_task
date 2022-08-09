<div>
    <div>
        <h4 class="dark:text-white">filter category</h4>
        <button style="cursor: pointer;margin: 5px;" type="button" wire:click="$set('category',null)">All</button>
    @foreach(\App\Models\PostCategory::all() as $category)
            <button style="cursor: pointer;margin: 5px;" type="button" wire:click="$set('category',{{$category->id}})">{{$category->name}}</button>
        @endforeach

    </div>
    <table class="table table-bordered text-center text-white">
        <thead>
            <tr>
                <th>Title</th>
                <th>Body</th>
                <th>Category</th>
            </tr>
        </thead>
        <tbody>
            @forelse($posts as $post)
                <tr>
                    <td>{{$post->title}}</td>
                    <td>{{\Illuminate\Support\Str::limit($post->content,30)}}</td>
                    <td>{{$post->category->name}}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No posts found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <br>
    <div>
        @if($posts->count() < 31)
            <span class="dark:text-white">No more posts.</span>
        @endif
        {!! $posts->links() !!}
    </div>
</div>
