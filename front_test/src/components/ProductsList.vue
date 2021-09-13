<template>
  <div>
    <h1>Items</h1>

    <table class="table table-hover">
      <thead>
      <tr>
        <td>ID</td>
        <td>Item Name</td>
        <td>Item detail</td>
      </tr>
      </thead>

      <tbody>
      <tr v-for="item in items" :key="item.id">
        <td>{{ item.id }}</td>
        <td>{{ item.name }}</td>
        <td>{{ item.detail }}</td>
        <td><router-link :to="{name: 'Edit', params: { id: item.id }}" class="btn btn-primary">Edit</router-link></td>
        <td><button class="btn btn-danger" @click="deleteProduct(item.id)">Delete</button></td>
      </tr>
      </tbody>
    </table>
    <form @submit.prevent="addProduct">
      <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" v-model="item.name">
      </div>
      <div class="form-group">
        <label>Detail</label>
        <input type="text" class="form-control" v-model="item.detail">
      </div>
      <button type="submit" class="btn btn-primary">Add product</button>
    </form>
  </div>
</template>

<script>
  import DataService from "../services/DataService";
  export default {
    data(){
      return{
        items: [],
        item: []
      }
    },

    created: function()
    {
      this.fetchItems();
    },

    methods: {
      fetchItems()
      {

        DataService.getAll().then(resp => {
          this.items = resp.data;
        })

      },
      addProduct() {
        var data = {
          name: this.item.name,
          detail: this.item.detail
        };

        DataService.create(data)
                .then(response => {
                  let new_product = response.data;
                  this.items.push(new_product);
                  this.item.name = "";
                  this.item.detail = "";
                })
                .catch(e => {
                  console.log(e);
                });
      },
      deleteProduct(id) {
        DataService.delete(id).then(response => {
          alert(response.data);
          let i = this.items.map(data => data.id).indexOf(id);
          this.items.splice(i, 1)
        });
      }
    }
  };
</script>

<style>
.list {
  text-align: left;
  max-width: 750px;
  margin: auto;
}
</style>
