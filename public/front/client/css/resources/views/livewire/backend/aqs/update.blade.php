<div class="row">
    @if ($showSuccess)
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">{{ __('Success') }}</h4>
            <div class="alert-body">
                {{ __('FQs updated successfully') }}
            </div>
        </div>
    @endif

    <x-form.input name="title" type="text" label="FQs title" placeholder="Enter the FQs title here ...." />

    <x-form.select name="status" label="FQs status" :options="App\Models\Aqs::STATUS" />

    <x-form.textarea name="answer" label="FQs answer" placeholder="Enter the FQs answer here ...." />

    <div>
        <x-form.submit text="Update" action="update()" type="button" />
    </div>
</div>
