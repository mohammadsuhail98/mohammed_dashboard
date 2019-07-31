<template>
  <div v-if="isUserGood" id="Dashboard">
    <div class="row justify-content-center">
      <div class="col-auto">
        <button class="btn btn-outline-info px-5 py-1">
          <h5
            @click="isUsers = !isUsers"
            class="title m-0"
          >{{ (!isUsers) ? 'أضهار المستخدمين' : 'أضهار المعلومات' }}</h5>
        </button>
      </div>
    </div>
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div
      class="modal fade"
      id="exampleModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">...</div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
    <div v-if="isUsers" class="row justify-content-center">
      <div class="col-md-6">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <div class="row justify-content-between">
              <div class="col-auto">
                <h3 class="panel-title">Users</h3>
              </div>
              <div class="col-auto">
                <button
                  type="button"
                  class="btn btn-primary"
                  data-toggle="modal"
                  data-target="#exampleModal"
                >أضافة يوزر</button>
              </div>
            </div>

            <div class="pull-right">
              <span
                class="clickable filter"
                data-toggle="tooltip"
                title="Toggle table filter"
                data-container="body"
              >
                <i class="glyphicon glyphicon-filter"></i>
              </span>
            </div>
          </div>
          <div class="panel-body">
            <input
              type="text"
              class="form-control"
              id="dev-table-filter"
              data-action="filter"
              data-filters="#dev-table"
              placeholder="Filter Developers"
            />
          </div>
          <table class="table table-hover" id="dev-table">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="user in users" :key="user.id">
                <td>{{ user.id }}</td>
                <td>{{ user.name }}</td>
                <td>{{ user.email }}</td>
                <td>{{ user.show_password }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div v-if="!isUsers" class="row justify-content-center">
      <div class="col-md-10">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">Forms Details</h3>
          </div>
          <div class="panel-body">
            <input
              type="text"
              class="form-control"
              id="dev-table-filter"
              data-action="filter"
              data-filters="#dev-table"
              placeholder="Filter Developers"
            />
          </div>
          <table class="table table-hover" id="dev-table">
            <thead>
              <tr>
                <th>#</th>
                <th>Field 1</th>
                <th>Field 2</th>
                <th>Field 3</th>
                <th>Field 4</th>
                <th>Field 5</th>
                <th>Field 6</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(item, index) in data" :key="index">
                <td>{{ index + 1 }}</td>
                <td>{{ item['formDetails'].site_type }}</td>
                <td>{{ item['formDetails'].cluster_enginner }}</td>
                <td>{{ item['formDetails'].date }}</td>
                <td>{{ item['formDetails'].location_latitude }}</td>
                <td>{{ item['formDetails'].site_ref }}</td>
                <td>{{ item['formDetails'].site_with_single_generator }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      users: [],
      isUsers: true,
      data: [],
      isUserGood: false
    };
  },
  async created() {
    await this.checkUser();
    await this.getUsers();
    await this.getFields();
  },
  methods: {
    checkUser() {
      if (!window.localStorage.getItem("token"))
        return (window.location.href = "http://127.0.0.1:8000/");
      let config = {
        headers: {
          Authorization: `Bearer ${window.localStorage.getItem("token")}`
        }
      };
      console.log(config);
      axios.post("http://127.0.0.1:8000/api/v1/me", {}, config).then(res => {
        if (res.data["is_admin"] == 1) this.isUserGood = true;
        else window.location.herf = "http://127.0.0.1:8000/user/dashboard";
      });
    },
    getUsers() {
      let config = {
        headers: {
          Authorization: `Bearer ${window.localStorage.getItem("token")}`
        }
      };
      console.log(config);
      axios
        .get("http://127.0.0.1:8000/api/v1/users", config)
        .then(res => (this.users = res.data["data"]));
    },
    getFields() {
      let config = {
        headers: {
          Authorization: `Bearer ${window.localStorage.getItem("token")}`
        }
      };
      console.log(config);
      axios
        .get("http://127.0.0.1:8000/api/v1/forms_details", config)
        .then(res => (this.data = res.data["data"]));
    }
  }
};
</script>

<style>
.row {
  margin-top: 40px;
  padding: 0 10px;
}
.clickable {
  cursor: pointer;
}

.panel-heading div {
  margin-top: -18px;
  font-size: 15px;
}
.panel-heading div span {
  margin-left: 5px;
}
.panel-body {
  display: none;
}
</style>
