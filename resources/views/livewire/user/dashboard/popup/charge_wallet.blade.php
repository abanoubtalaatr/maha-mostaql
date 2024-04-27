<div class="modal" id="charge" style="display: block">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background: linear-gradient(to right, #475770, #2b313b);color:white">
            <div class="modal-header">
                <h5 class="modal-title" id="sendEmailModalLabel">شحن الرصيد</h5>
                <button type="button" class="close border-0 p-0 bg-none px-2 rounded" wire:click="toggleChargeWalletModal" data-dismiss="modal" aria-label="Close" onclick="$('#withdrawModal').modal('hide');">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="withdraw-amount" class="form-label">المبلغ</label>
                    <input id="withdraw-amount"  wire:model="charge_amount" type="text" class="form-control shadow rad-20 py-2" placeholder="المبلغ">
                </div>
                @error('charge_amount')<p class="text-danger">{{ $message }}</p> @enderror

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="withdraw-option" id="paypal-option" value="paypal" wire:model="charge_type">
                    <label class="form-check-label" for="paypal-option">Paypal</label>
                </div>

                {{-- <div class="form-check">
                    <input class="form-check-input" type="radio" name="withdraw-option" id="bank-option" value="bank" wire:model="charge_type">
                    <label class="form-check-label" for="bank-option">بنك</label>
                </div> --}}

                @error('charge_type')<p class="text-danger">{{ $message }}</p> @enderror
            </div>
            @if(isset($message) && !empty($message) && !is_null($message))
                <div class="form-group mt-1  p-2">
                    <div class="btn btn-danger form-control contact-">{{$message}} </div>
                </div>
            @endif
            <div class="modal-footer">
                <button class="btn btn-light" id="spinner" wire:click="charge()">
                    @include('livewire.shared.spinner_html')
                    <span>ارسال</span>
                </button>
                <button type="button" class="btn btn-secondary" wire:click="toggleChargeWalletModal">اغلاق</button>
            </div>
        </div>
    </div>
</div>
@include('livewire.shared.spinner_script')
