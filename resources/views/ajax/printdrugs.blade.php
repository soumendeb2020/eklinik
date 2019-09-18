<div id="printdiv">
    <div class="container">
        <div class="row">
            <div class="col-sm-2" style="width: 16.66666667%; float: left;padding-right: 15px;padding-left: 15px;"></div>
            <div class="col-sm-8" style="width: 66.66666667%; float: left;padding-right: 15px;padding-left: 15px;">
                @foreach ($drugs as $d)
                <div class="medicine-wrap">
                    <p class="txt">{{$name}}</p>
                    <p style="font-family: sans-serif; font-size: 18px;line-height: 24px;margin: 0;"><u>Date: {{$curDate}}&nbsp;&nbsp;&nbsp;&nbsp;No.K/P: {{$curicno}}</u></p>
                    <p style="font-family: sans-serif; font-size: 18px;line-height: 20px;margin: 0;">{{$d->drugs}}</p>
                    <p style="font-family: sans-serif; font-size: 18px;line-height: 20px;margin: 0;">{{$d->description}}</p>
                    <p style="font-family: sans-serif; font-size: 18px;line-height: 24px;margin: 0 0 5px;"><u>Qty: {{$d->drugs}} () - {{$d->dossage}} - {{$d->note}}</u></p>
                    <p style="font-family: sans-serif; font-size: 18px;line-height: 20px;margin: 0;">KLINIK KESIHATAN MBPJ &nbsp;&nbsp;&nbsp;&nbsp;TEL: 03-7956 5017</p>
                    <p style="font-family: sans-serif; font-size: 18px;line-height: 20px;margin: 0;">No. 43, Jln St Jernih 8/1, 46050 Petaling Jaya, Selangor</p>
                </div>
                @endforeach
            </div>
            <div class="col-sm-2" style="width: 16.66666667%;; float: left;padding-right: 15px;padding-left: 15px;"></div>
        </div>
    </div>
</div>
