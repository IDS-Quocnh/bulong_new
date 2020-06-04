<div class="top-ad">
    @php
        $ads = App\Model\Ads::find(0);
    @endphp
    <div style="width: 728px;height: 90px; overflow: hidden">

    {!!html_entity_decode($ads->top_ad)!!}
    </div>
</div>
