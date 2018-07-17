<template>
  <section class="hero is-fullheight" id="login">
    <div class="hero-body">
      <div class="container has-text-centered">
        <div class="column is-4 is-offset-4">
          <h3 class="title has-text-grey">Login</h3>
          <p class="subtitle has-text-grey">Please login to proceed.</p>
          <div class="box">
            <figure class="avatar">
              <img src="https://placehold.it/128x128">
            </figure>
            <form :action="action" method="POST">
              <input type="hidden" name="_token" :value="token" />
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
                <label class="checkbox">
                  <input type="checkbox" name="remember"> Remember me
                </label>
              </div>
              <button class="button is-block is-info is-large is-fullwidth" type="submit">Login</button>
            </form>
          </div>
          <p class="has-text-grey">
            <a href="/register">Sign Up</a> &nbsp;·&nbsp;
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
