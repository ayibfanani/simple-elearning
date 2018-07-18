<template>
  <div>
    <p class="title is-4 has-text-centered">Find Course</p>

    <div class="columns">
      <div class="column">
        <div class="box">
          <form action="/home" method="GET">
            <div class="field has-addons">
              <div class="control">
                <span class="select">
                  <select name="lecturer" :value="query.lecturer">
                    <option value="">All</option>
                    <option v-for="(lecturer, index) in lecturers" :key="index" :value="lecturer.id">{{ lecturer.name }}</option>
                  </select>
                </span>
              </div>
              <div class="control is-expanded">
                <input type="text" class="input" placeholder="Search..." name="query" :value="query.query"/>
              </div>
              <div class="control">
                <button type="submit" class="button is-primary"><i class="fa fa-search"></i>&nbsp;Search</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div v-if="courses[0].length != 0">
      <div class="columns" v-for="(courses_ch, index_ch) in courses" :key="index_ch">
        <div class="column is-4" v-for="(course, index) in courses_ch" :key="index">
          <a :href="`/courses/${course.id}`">
            <div class="card">
              <div class="card-image">
                <a class="button-favorite has-text-warning"
                  href=""
                  @click.prevent="favorite_courses.indexOf(course.id) != -1 ? unfavorite(course.id) : favorite(course.id)"
                >
                  <i class="fa fa-lg" :class="favorite_courses.indexOf(course.id) != -1 ? 'fa-star' : 'fa-star-o'"></i>
                </a>
                <figure class="image is-4by3">
                  <img :src="course.thumb !== null && course.thumb.length != 0 ? course.thumb : 'https://bulma.io/images/placeholders/1280x960.png'" alt="Placeholder image">
                </figure>
              </div>
              <div class="card-content">
                <div class="media">
                  <div class="media-content">
                    <p class="title is-5" style="margin-bottom: 0.5rem;" :title="course.title">{{ course.title.substring(0, 30) }}...</p>
                    <!-- <p class="subtitle is-6">{{ course.author.email }}</p> -->
                  </div>
                </div>

                <div class="content" :title="course.subtitle">
                  {{ course.subtitle.substring(0, 70) }}...
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
              <div class="card-footer">
                <span class="card-footer-item">
                  <small><i class="fa fa-user"></i>&nbsp;{{ course.user.name }}</small>
                </span>
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
    encoded_req_query: {
      type: String,
    },
    encoded_favorite_courses: {
      type: String,
    },
    encoded_user: {
      type: String,
      default: () => null
    },
    encoded_lecturers: {
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
      query: JSON.parse(this.encoded_req_query),
      favorite_courses: JSON.parse(this.encoded_favorite_courses),
      user: JSON.parse(this.encoded_user),
      courses: collect(JSON.parse(this.encoded_courses)).chunk(3).toArray(),
      lecturers: JSON.parse(this.encoded_lecturers)
    }
  },

  methods: {
    favorite(course_id) {
      let formUnFavorite = `
        <form method="POST" action="/favorite/${course_id}">
          <input type="hidden" name="_token" value="${this.token}"/>
        </form>
      `;

      $(formUnFavorite).appendTo('body').submit();
    },
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
