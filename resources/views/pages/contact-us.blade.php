<x-site-layout>
    <div class="contact-info-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-4">
                    <div class="contact-info">
                        <i class="icofont-location-pin"></i>
                        <span>@lang('Location'):</span>
                        {{ setting('general', 'address') }}
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="contact-info">
                        <i class="icofont-ui-call"></i>
                        <span>@lang('Phone'):</span>
                        <a href="tel:{{ setting('general', 'contact_phone') }}">{{ setting('general', 'contact_phone') }}</a>
                    </div>
                </div>
                <div class="col-sm-6 offset-sm-3 offset-lg-0 col-lg-4">
                    <div class="contact-info">
                        <i class="icofont-ui-email"></i>
                        <span>@lang('Email'):</span>
                        <a href="tel:{{ setting('general', 'contact_email') }}">{{ setting('general', 'contact_email') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contact-area pb-70">
        <div class="container">
            <x:form :action="route('contact-us')" method="POST" id="contactForm" novalidate="true">
                <h2>@lang('Let\'s talk...!')</h2>
                <p>@lang('Mail us directly, we\'ll reply you as soon as possible.')</p>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>
                                <i class="icofont-user-alt-3"></i>
                            </label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Name" required="" data-error="Please enter your name">
                            <div class="help-block with-errors">
                                <ul class="list-unstyled">
                                    @error('name')
                                    <li>{{ $message }}</li>
                                    @enderror
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>
                                <i class="icofont-ui-email"></i>
                            </label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email" required="" data-error="Please enter your email">
                            <div class="help-block with-errors">
                                <ul class="list-unstyled">
                                    @error('email')
                                    <li>{{ $message }}</li>
                                    @enderror
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>
                                <i class="icofont-ui-call"></i>
                            </label>
                            <input type="text" name="phone_number" id="phone_number" placeholder="Phone" required="" data-error="Please enter your number" class="form-control">
                            <div class="help-block with-errors">
                                <ul class="list-unstyled">
                                    @error('phone_number')
                                    <li>{{ $message }}</li>
                                    @enderror
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>
                                <i class="icofont-notepad"></i>
                            </label>
                            <input type="text" name="subject" id="subject" class="form-control" placeholder="Subject" required="" data-error="Please enter your subject">
                            <div class="help-block with-errors">
                                <ul class="list-unstyled">
                                    @error('subject')
                                    <li>{{ $message }}</li>
                                    @enderror
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>
                                <i class="icofont-comment"></i>
                            </label>
                            <textarea name="message" class="form-control" id="message" cols="30" rows="8" placeholder="Write message" required="" data-error="Write your message"></textarea>
                            <div class="help-block with-errors">
                                <ul class="list-unstyled">
                                    @error('message')
                                    <li>{{ $message }}</li>
                                    @enderror
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <button type="submit" class="btn common-btn disabled" style="pointer-events: all; cursor: pointer;">
                            @lang('Send Message')
                        </button>
                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </x:form>
        </div>
    </div>
</x-site-layout>
