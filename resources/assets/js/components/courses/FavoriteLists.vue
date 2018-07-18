<template>
  <div>
    <p class="title is-4">Favorite Courses</p>

    <div v-if="courses[0].length != 0">
      <div class="columns" v-for="(courses_ch, index_ch) in courses" :key="index_ch">
        <div class="column is-4" v-for="(course, index) in courses_ch" :key="index">
          <a :href="`/courses/${course.id}`">
            <div class="card">
              <div class="card-image">
                <a class="button-favorite has-text-warning" href="" @click.prevent="unfavorite(course.id)"><i class="fa fa-star fa-lg"></i></a>
                <figure class="image is-4by3">
                  <img :src="course.thumb !== null && course.thumb.length != 0 ? course.thumb : 'https://bulma.io/images/placeholders/1280x960.png'" alt="Placeholder image">
                </figure>
              </div>
              <div class="card-content">
                <div class="media">
                  <div class="media-content">
                    <p class="title is-4" style="margin-bottom: 0.5rem;">{{ course.title.substring(0, 50) }}...</p>
                    <!-- <p class="subtitle is-6">{{ course.author.email }}</p> -->
                  </div>
                </div>

                <div class="content">
                  {{ course.subtitle.substring(0, 100) }}...
                  <br>
                  <br>
                  <!-- <p>{{ course.courses.length }} Courses</p> -->
                  <div class="columns">
                    <div class="column">
                      <div class="is-pulled-left">
                          <span class="tag is-rounded">{{ course.created_at }}</span>
                      </div>

                      <div class="is-pulled-right">
                          <span class="has-text-grey">{{ course.comments.length }} <i class="fa fa-comments"></i></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>

    <div v-else>
      <div class="box">
        There is no courses found.
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    token: {
      type: String,
      required: true,
    },
    encoded_user: {
      type: String,
      default: () => null
    },
    encoded_courses: {
      type: String,
      default: () => null
    }
  },

  data() {
    return {
      user: JSON.parse(this.encoded_user),
      courses: collect(JSON.parse(this.encoded_courses)).chunk(3).toArray()
    }
  },

  methods: {
    unfavorite(course_id) {
      if (confirm('Are you sure?')) {
        let formUnFavorite = `
          <form method="POST" action="/favorite/${course_id}">
            <input type="hidden" name="_token" value="${this.token}"/>
            <input type="hidden" name="_method" value="DELETE"/>
          </form>
        `;

        $(formUnFavorite).appendTo('body').submit();
      }
    }
  }
}
</script>

<style>

</style>
