@if(!empty($priceInfo))
    <h5 class="text-primary mb-2">
        {{ number_format($priceInfo['final_price'], 2) }} {{ $priceInfo['currency'] }}

        @if($priceInfo['base_price'] < $priceInfo['original_price'])
            <span class="text-danger fs-9">
                <del>{{ number_format($priceInfo['original_price'], 2) }}</del>
            </span>
        @endif
    </h5>
@else
    <h5 class="text-primary mb-3">00.00 BDT</h5>
@endif
