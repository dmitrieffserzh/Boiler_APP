<div class="component component-user_info">
    <div class="component-user_info__photo d-inline-block position-relative">
        <img src="{{ UsersHelper::get_avatar($content->owner->avatar ?? null) }}" alt="" width="32px"
             style="border-radius: 50%">
        @if( $content->owner->is_online() )
            <span class="component-status component-status--online"></span>
        @else
            <span class="component-status component-status--offline"></span>
        @endif
    </div>
    <div class="component-user_info__  d-inline-block font-weight-bold text-dark">{{$content->owner->username }}</div>
    <div class="component-user_info__  d-inline-block text-muted small lh-125 font-weight-light font-monospace">{{$content->created_at->diffForHumans() }}</div>
</div>