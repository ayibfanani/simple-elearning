<template>
  <div>
    <!-- <nav class="breadcrumb" aria-label="breadcrumbs">
      <ul>
        <li><a href="#">Modules</a></li>
        <li class="is-active"><a href="#" aria-current="page">Breadcrumb</a></li>
      </ul>
    </nav> -->
    <section class="hero is-info welcome is-small sapaan">
      <div class="hero-body">
        <h1 class="title">
          Hello, {{ user.name }}.
        </h1>
        <h2 class="subtitle">
          I hope you are having a great day!
        </h2>
      </div>
    </section>
    <div class="columns">
      <div class="column is-half" v-for="(module, index) in modules" :key="index">
        <a href="">
          <div class="card">
            <div class="card-image">
              <figure class="image is-4by3">
                <img :src="module.backdrop" alt="Placeholder image">
              </figure>
            </div>
            <div class="card-content">
              <div class="media">
                <div class="media-content">
                  <p class="title is-4" style="margin-bottom: 0.5rem;">{{ module.title }}</p>
                  <!-- <p class="subtitle is-6">{{ module.author.email }}</p> -->
                </div>
              </div>

              <!-- <div class="media">
                <div class="media-left">
                  <figure class="image is-48x48">
                    <img :src="module.author.avatar" alt="Placeholder image">
                  </figure>
                </div>
                <div class="media-content">
                  <p class="title is-4" style="margin-bottom: 0.5rem;">{{ module.author.name }}</p>
                  <p class="subtitle is-6">{{ module.author.email }}</p>
                </div>
              </div> -->

              <div class="content">
                {{ module.description }}
                <br>
                <!-- <p>{{ module.courses.length }} Courses</p> -->
                <time>Last Updated: {{ module.updated_at }}</time>
              </div>
            </div>

            <footer class="card-footer">
              <a href="#" class="card-footer-item">Save</a>
              <a href="#" class="card-footer-item">Edit</a>
              <a href="#" class="card-footer-item">Delete</a>
            </footer>
          </div>
        </a>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    encoded_user: {
      type: String,
      default: () => null
    }
  },

  data() {
    return {
      user: JSON.parse(this.encoded_user),
      modules: [
        {
          title: 'The art of Startup',
          description: 'Test',
          backdrop: 'https://bulma.io/images/placeholders/1280x960.png',
          created_at: '',
          updated_at: '5 Days',
          author: {
            name: 'Ayib Fanani',
            email: 'ayibfanani@gmail.com',
            avatar: 'https://bulma.io/images/placeholders/96x96.png'
          },
          courses: []
        },
        {
          title: 'Supply Chain Management',
          description: 'Test',
          backdrop: 'https://bulma.io/images/placeholders/1280x960.png',
          created_at: '',
          updated_at: '5 Days',
          author: {
            name: 'Ayib Fanani',
            email: 'ayibfanani@gmail.com',
            avatar: 'https://bulma.io/images/placeholders/96x96.png'
          },
          courses: []
        }
      ]
    }
  }
}
</script>

<style>

</style>
