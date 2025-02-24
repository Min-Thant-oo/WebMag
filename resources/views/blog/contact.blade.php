<x-blog.layout>

    <div>
        <div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-10">
                        <ul class="page-header-breadcrumb">
                            <li><a href="{{ route('blog.index') }}">Home</a></li>
                            <li>Contact</li>
                        </ul>
                        <h1>Contact Us</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="section">

            <div class="container">

                <div class="row">
                    <div class="col-md-6">
                        <div class="section-row">
                            <h3>Contact Information</h3>
                            <p>{{ $contact_message }}</p>
                            <ul class="list-style">
                                <li><p><strong>Email:</strong> <a href="mailto:{{ $configs->email }}">{{ $configs->email }}</a></p></li>
                                <li><p><strong>Phone:</strong> <a href="phoneto:{{ $configs->phone }}">{{ $configs->phone }}</a></p></li>
                                <li><p><strong>Address:</strong> {{ $configs->address }}</p></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-5 col-md-offset-1">
                        <div class="section-row">
                            <h3>Send A Message</h3>

                            <x-blog.alert-message />

                            <form method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <span>Email</span>
                                            <input class="input" required type="email" name="email" value="{{ old('email') }}" >
                                            <x-error name='email' />
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <span>Subject</span>
                                            <input class="input" required type="text" name="subject" value="{{ old('subject') }}" >
                                            <x-error name='subject' />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea class="input" required name="message" placeholder="Message">{{ old('message') }}</textarea>
                                            <x-error name='message' />
                                        </div>
                                        <button class="primary-button">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

</x-blog.layout>
