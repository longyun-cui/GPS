@foreach($item_list as $item)
<a href="{{ url('/product-detail?id='.$item->id) }}">
<li class="item">
    <div class="product-img">
        <div class="image-box">
            <img src="{{ url(env('DOMAIN_CDN').'/'.$item->cover_pic) }}" alt="Product Image">
        </div>
    </div>
    <div class="product-info">
        <a href="javascript:void(0)" class="product-title">
            {{ $item->title or 'TITLE' }}
        </a>
        <span class="product-description">
            {{ $item->description or 'TITLE' }}
        </span>
        <span class="product-description">
            <span class="label label-warning pull-right-">
                {{ $item->wholesale_price or '' }}/{{ $item->wholesale_amount or '' }}起批
            </span>
        </span>
    </div>
</li>
</a>
@endforeach