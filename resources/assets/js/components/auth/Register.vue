<template>
  <section class="hero is-success is-fullheight">
    <div class="hero-body">
      <div class="container has-text-centered">
        <div class="column is-4 is-offset-4">
          <h3 class="title has-text-grey">Register</h3>
          <p class="subtitle has-text-grey">Please register your account.</p>
          <div class="box">
            <figure class="avatar">
              <img src="https://placehold.it/128x128">
            </figure>
            <form :action="action" method="POST">
              <input type="hidden" name="_token" :value="token" />
              <div class="field">
                <div class="control">
                  <input class="input is-large" type="text" placeholder="Your Fullname" autofocus="" name="name">
                </div>
              </div>

              <div class="field">
                <div class="control">
                  <input class="input is-large" type="email" placeholder="Your Email" autofocus="" name="email">
                </div>
              </div>

              <div class="field">
                <div class="control">
                  <input class="input is-large" type="password" placeholder="Your Password" name="password">
                </div>
              </div>

              <div class="field">
                <div class="control">
                  <input class="input is-large" type="password" placeholder="Password Confirmation" name="password_confirmation">
                </div>
              </div>
              <button class="button is-block is-info is-large is-fullwidth" type="submit">Register</button>
            </form>
          </div>
          <p class="has-text-grey">
            <a href="/login">Sign In</a> &nbsp;·&nbsp;
            <a href="/password/reset">Forgot Password</a> &nbsp;·&nbsp;
            <a href="../">Need Help?</a>
          </p>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
  export default {
    props: ['action', 'token']
  }
</script>
