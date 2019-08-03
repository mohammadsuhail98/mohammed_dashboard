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
        <button @click="logout" class="btn btn-outline-danger px-5 py-1">
          <h5 class="title m-0">تسجيل ئاسك اوت</h5>
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
            <h5 class="modal-title" id="exampleModalLabel">أضافة حساب لليوزر</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h1 class="title">Add user to ur ass</h1>
            <div v-if="!userRegistrationDone">
              <div class="form-group">
                <input type="text" v-model="form.name" class="form-control" placeholder="User Name" />
              </div>
              <div class="form-group">
                <input
                  type="email"
                  v-model="form.email"
                  class="form-control"
                  placeholder="User Email"
                />
              </div>
              <div class="form-group">
                <input
                  type="phone"
                  v-model="form.phone"
                  class="form-control"
                  placeholder="User Phone"
                />
              </div>
              <div class="form-group">
                <input
                  type="password"
                  v-model="form.password"
                  class="form-control"
                  placeholder="User Password"
                />
              </div>
            </div>
            <div v-if="userRegistrationDone">
              <h3 class="title text-danger">User has been created</h3>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" @click="registration" class="btn btn-primary">Add User</button>
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
                <th>Phone</th>
                <th>Password</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="user in users" :key="user.id">
                <td>{{ user.id }}</td>
                <td>{{ user.name }}</td>
                <td>{{ user.email }}</td>
                <td>{{ user.phone }}</td>
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
          <a
            href="http://127.0.0.1:8000/api/v1/forms_excel"
            target="_blank"
            class="btn btn-outline-danger"
            rel="noopener noreferrer"
          >Download as Excel sheet</a>
          <!-- Modal -->

          <div
            class="modal fade bd-example-modal-lg"
            id="exampleModal1"
            tabindex="-1"
            role="dialog"
            aria-labelledby="exampleModalLabel1"
            aria-hidden="true"
          >
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel1">Single Data user</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <ul class="list-group" v-if="item != ''">
                    <li class="list-group-item">
                      <div class="row mt-0 justify-content-around">
                        <div class="col-md-auto">Field 1</div>
                        <div class="col-md-auto">{{ item['formDetails'].site_type }}</div>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <div class="row mt-0 justify-content-around">
                        <div class="col-md-auto">Field 1</div>
                        <div class="col-md-auto">{{ item['formDetails'].cluster_enginner }}</div>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <div class="row mt-0 justify-content-around">
                        <div class="col-md-auto">Field 1</div>
                        <div class="col-md-auto">{{ item['formDetails'].date}}</div>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <div class="row mt-0 justify-content-around">
                        <div class="col-md-auto">Field 1</div>
                        <div class="col-md-auto">{{ item.location_latitude }}</div>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <div class="row mt-0 justify-content-around">
                        <div class="col-md-auto">Field 1</div>
                        <div class="col-md-auto">{{ item['formDetails'].location_latitude }}</div>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <div class="row mt-0 justify-content-around">
                        <div class="col-md-auto">Field 1</div>
                        <div class="col-md-auto">{{ item['formDetails'].site_ref }}</div>
                      </div>
                    </li>
                  </ul>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
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
                <th>Actions</th>
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
                <td>
                  <button
                    type="button"
                    class="btn btn-primary"
                    data-toggle="modal"
                    data-target="#exampleModal1"
                    @click="showSingle(item)"
                  >Show more</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
let config = {
  headers: {
    Authorization: `Bearer ${window.localStorage.getItem("token")}`
  }
};
export default {
  data() {
    return {
      users: [],
      isUsers: true,
      data: [],
      isUserGood: false,
      form: {
        name: "",
        email: "",
        password: "",
        phone: ""
      },
      userRegistrationDone: false,
      item: ""
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
      axios.get("http://127.0.0.1:8000/api/v1/user", config).then(res => {
        if (res.data["is_admin"] == 1) this.isUserGood = true;
      });
    },
    showSingle(item) {
      this.item = item;
    },
    logout() {
      window.localStorage.removeItem("token");
      window.location.href = "http://127.0.0.1:8000/";
    },
    getUsers() {
      axios
        .get("http://127.0.0.1:8000/api/v1/users", config)
        .then(res => (this.users = res.data["data"]));
    },
    getFields() {
      axios
        .get("http://127.0.0.1:8000/api/v1/forms_details", config)
        .then(res => (this.data = res.data["data"]));
    },
    registration() {
      axios
        .post("http://127.0.0.1:8000/api/v1/registration", this.form, config)
        .then(res => {
          if (res.data["success"]) this.userRegistrationDone = true;
        });
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
