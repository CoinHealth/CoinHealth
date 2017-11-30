<div class="row mt-10">
    <div class="col-md-12">
        <span class="subcategory">Subscription</span>
    </div>
</div>
<div class="row">
    <div class="col-md-3 col-sm-3 col-xs-3">
        <p>Credit Card Type:</p>
    </div>
    <div class="col-md-9 col-sm-9 col-xs-9">
        <p>{{ auth()->user()->card_brand }}</p>
    </div>
</div>
<div class="row">
    <div class="col-md-3 col-sm-3 col-xs-3">
        <p>Credit Card Number:</p>
    </div>
    <div class="col-md-9 col-sm-9 col-xs-9">
        <p>{{ str_pad(auth()->user()->card_last_four, 16, 'x', STR_PAD_LEFT) }}</p>
    </div>
</div>
