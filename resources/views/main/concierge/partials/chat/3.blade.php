<div class="carla pull-left parent">
    <p class="status"><span class="name">Carla</span> <span class="time">10:25am</span></p>
    <div class="box">
        <img src="/assets/icons/modal-logo.png" alt="" class="carla-logo">
        <p>
            What is your date of birth?
        </p>
        <div class="row row-name">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <select class="form-control" data-input name="month">
                            @for ($i=1; $i<=12 ; $i++)
                                <option value="{{ date("F",strtotime(date("Y")."-".$i."-01")) }}">{{ date("F",strtotime(date("Y")."-".$i."-01")) }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select class="form-control" data-input name="day">
                            @for ($d=1; $d <= 31; $d++)
                                <option value="{{ $d }}">{{ $d }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select class="form-control" data-input name="year">
                            @for ($y=1950; $y <= date('Y'); $y++)
                                <option value="{{ $y }}">{{ $y }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <a href="javascript:void(0)" rel="nofollow" class="continue"  data-step  data-next="4" data-answer="3">
                    CONTINUE
                </a>
            </div>
        </div>
    </div>
</div>
