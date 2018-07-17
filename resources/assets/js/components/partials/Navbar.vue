<template>
  <nav class="navbar is-white">
    <div class="container">
      <div class="navbar-brand">
        <a class="navbar-item brand-text" href="../">
          Simple E-Learning
        </a>
        <div class="navbar-burger burger" data-target="navMenu">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
      <div id="navMenu" class="navbar-menu">
        <div class="navbar-start">
          <a class="navbar-item" href="admin.html">
            Courses
          </a>
        </div>

        <div class="navbar-end">
          <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-link" href="/courses">
              My Courses
            </a>
            <div class="navbar-dropdown is-boxed">
              <a class="navbar-item" href="/courses/add">
                <i class="fa fa-plus"></i>&nbsp;Add New
              </a>
            </div>
          </div>
          <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-link" href="" @click.prevent="">
              <i class="fa fa-cog"></i>
            </a>
            <div class="navbar-dropdown is-boxed">
              <a class="navbar-item" href="/logout">
                Logout
              </a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </nav>
</template>

<script>
    export default {
    }
</script>
