@extends('layout.commonplate')

@section('styles')
<style>
    @import url(https://fonts.googleapis.com/css?family=Roboto:300);

.login-page {
  width: 360px;
  padding: 8% 0 0;
  margin: auto;
}
.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #4CAF50;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form button:hover,.form button:active,.form button:focus {
  background: #43A047;
}
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}
.form .message a {
  color: #4CAF50;
  text-decoration: none;
}

.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}
.container:before, .container:after {
  content: "";
  display: block;
  clear: both;
}
.container .info {
  margin: 50px auto;
  text-align: center;
}
.container .info h1 {
  margin: 0 0 15px;
  padding: 0;
  font-size: 36px;
  font-weight: 300;
  color: #1a1a1a;
}
.container .info span {
  color: #4d4d4d;
  font-size: 12px;
}
.container .info span a {
  color: #000000;
  text-decoration: none;
}
.container .info span .fa {
  color: #EF3B3A;
}
body {
  background: #76b852; /* fallback for old browsers */
  background: hsl(203, 65%, 21%);
  /* background: linear-gradient(90deg, rgba(141,194,111,1) 0%, rgba(118,184,82,1) 50%); */
  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;      
}
.main-login-div{
    display: flex;
}
.side-bar{
    background-color: #d1e7fd;
    align-items: center;
    justify-items: center;
    height: 100vh;
    padding: 2%;
    width: 500px;   
}
.side-bar h1{
    width: 100%;
    color: #092644;
    font-family: 'Nunito Sans', sans-serif;
    text-align: center;
    font-size: 80px;
    z-index: 5;
}
.side-bar p{
    position: fixed;
    width: 33%;
    text-align: center;
    bottom: 10px;
}
#image{
    position: absolute;
    width: 400px;
    left: 20%;
    z-index: 1;
    mix-blend-mode:color-burn;
    top: 30%;
    opacity: 40%;
    box-shadow: #09440c;
    transform: rotate(-30deg);
}
@media (max-width:700px){
  .main-login-div{
    flex-direction: column;
  }
  .side-bar{
    width: 100vw;
    height: 25vh;
  }
  .login-page{
    width: 100vw;
    height: 90vh;
  }

  .side-bar h1{
    font-size: 50px;
    font-weight: 900;
    margin-top: -30%; 
  }

  #image{
    width: 200px;
    top:40px;
    left: 10px;
  }
  .footer{
    color: white;
  }
 
}
</style>
@endsection
@section('workspace')
<div class="main-login-div">
    <div class="side-bar"><br><br><br><br><br> <br><br>
        <h1>Instant Convert</h1>
        <img id="image" src="/images/greengear.png" alt="">
        <div class="footer">
            <p>&copy; 2023 Instant Convert. All rights reserved.</p>
        </div>
    </div>
    <div class="login-page">
        <div class="form">
            @if ($errors->any())
                <div style="position: absolute; right:20px; background-color:black; border-radius:30px;">
                    @foreach ($errors->all() as $error)
                        <p style=" color:red; padding:10px; ">{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            <h2>Register</h2>
            <form action="{{ route('userregister') }}" method="post" class="register-form">
                @csrf
                <input type="text" name="name" placeholder="name" required/>
                <input type="text" name="email" placeholder="email address" required />
                <input type="password" name="password" placeholder="password" required/>
                <input style="background-color:#3e6b98; color:white;" type="submit" value="Register">
                <p class="message">Already registered? <a style="color: #091944; font-weight:700;" href="/login">log In</a></p>
            </form>
        </div>
    </div>
    @if (Session::has('success'))
        <p style="position: absolute; top: 30px; right: 30px; border-radius: 20px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); text-align: center; color: #1d471d; background: linear-gradient(185deg, #aaffaa, #88cc88); width: 400px; font-size: 20px; padding: 5px;">
            {{ Session::get('success') }}</p>
    @endif
</div>
@endsection
