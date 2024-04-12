<div class="modal" id="withdraw" style="display: block">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background: linear-gradient(to right, #475770, #2b313b);">
            <div class="modal-header">
                <h5 class="modal-title" id="sendEmailModalLabel">سحب الرصيد</h5>
                <button type="button" class="close border-0 p-0 bg-none px-2 rounded" wire:click="toggleWidthDrawModel" data-dismiss="modal" aria-label="Close" onclick="$('#withdrawModal').modal('hide');">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label>اختار </label>

                <div class="mb-3">
                    <label for="withdraw-amount" class="form-label">المبلغ</label>
                    <input id="withdraw-amount" disabled wire:model="amountCanWithDraw" type="text" class="form-control shadow rad-20 py-2" placeholder="المبلغ">
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="withdraw-option" id="paypal-option" value="paypal" wire:model="withdraw_type">
                    <label class="form-check-label" for="paypal-option">بيبال</label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="withdraw-option" id="bank-option" value="bank" wire:model="withdraw_type">
                    <label class="form-check-label" for="bank-option">بنك</label>
                </div>

                @if($withdraw_type == 'paypal')
                    <div class="mb-3">
                        <label for="paypal-email" class="form-label"> البريد الإلكتروني ( بيبال )</label>
                        <input id="paypal-email" wire:model="paypal_email" type="email" class="form-control shadow rad-20 py-2" placeholder="ادخل بريد Paypal">
                    </div>
                @endif

                @if($withdraw_type == 'bank')
                    <div class="mb-3">
                        <label for="bank-account" class="form-label">رقم الحساب البنكي</label>
                        <input id="bank-account" wire:model="bank_account" type="text" class="form-control shadow rad-20 py-2" placeholder="ادخل رقم الحساب البنكي">
                    </div>
                    <div class="mb-3">
                        <label for="card-name" class="form-label">اسم البطاقة</label>
                        <input id="card-name" wire:model="card_name" type="text" class="form-control shadow rad-20 py-2" placeholder="ادخل اسم البطاقة">
                    </div>
                    <div class="mb-3">
                        <label for="bank-name" class="form-label">اسم البنك</label>
                        <input id="bank-name" wire:model="bank_name" type="text" class="form-control shadow rad-20 py-2" placeholder="ادخل اسم البنك">
                    </div>
                @endif

                @error('withdraw_type')<p class="text-danger">{{ $message }}</p> @enderror
                @error('paypal_email')<p class="text-danger">{{ $message }}</p> @enderror
                @error('bank_account')<p class="text-danger">{{ $message }}</p> @enderror
                @error('card_name')<p class="text-danger">{{ $message }}</p> @enderror
                @error('bank_name')<p class="text-danger">{{ $message }}</p> @enderror

            </div>
            @if(isset($message) && !empty($message) && !is_null($message))
                <div class="form-group mt-1  p-2">
                    <div class="btn btn-danger form-control contact-">{{$message}} </div>
                </div>
            @endif
            <div class="modal-footer">
                <button class="btn btn-light" wire:click="requestWithdraw()">ارسال</button>
                <button type="button" class="btn btn-secondary" wire:click="toggleWidthDrawModel">اغلاق</button>
            </div>
        </div>
    </div>
</div>
