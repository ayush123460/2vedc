<div class="container-fluid contact">
    <div class="container">
        <center><h1>GOT SOMETHING TO SAY? WE'LL BE GLAD TO HEAR!</h1></center>
        <form action="/contact" method="post">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-6">
                    <label for="name">Name:</label>
                </div>
                <div class="col-md-6">
                    <label for="email">Email:</label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <input type="text" name="name" placeholder="Name" class="form-control">
                </div>
                <div class="col-md-6">
                    <input type="email" name="email" placeholder="example@contoso.com" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="body">Message:</label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <textarea name="message" cols="30" rows="10" class="form-control" placeholder="Your message..."></textarea>
                </div>
            </div>
            <div class="row" style="margin-top: 20px;">
                <div class="col-md-4">
                    <input type="submit" value="Submit" class="btn btn-primary form-control">
                </div>
            </div>
            @if(isset($msg))
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="alert alert-warning">Successfully sent.</div>
                </div>
            </div>
            @endif
        </form>
    </div>
</div>
<div class="container-fluid footer">
    <div class="container">
        <p>Too Vedic &copy; 2018 VIT Bhopal University</p>
    </div>
</div>