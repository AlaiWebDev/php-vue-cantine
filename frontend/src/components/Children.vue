<template>
<h1>Espace Enfants</h1>
<div id="container">
    <img src="../assets/logo-transparent.png" alt="logo">
    <table>
        <caption></caption>
        <thead>
            <tr>
                <th>Prénom</th>
                <th>Date de naissance</th>
                <th>Régime cantine</th>
                <th>Allergies</th>
                <th>Inscrit(e) le</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(child, key, index) in selected" :key="index">
                
                <td  v-for="(oneChild, key, index) in child" :key="index">
                    {{ oneChild }}
                </td>
            </tr>
        </tbody>
    </table>
    <router-link to="/addchild">Inscrire mon enfant</router-link>
</div>
</template>

<script>
export default {
    name: 'Children',
    props: {
        children: {},
        
    },
    data: function () {
        return {
            selected: []
        }
    },
    computed: {
        selected: function () {
            return this.children;
        }
    },
    beforeUpdate() {
        this.selected = this.children;
        for (let i = 0; i < this.selected.length; i++) {
                delete this.selected[i].id;
                delete this.selected[i].parent_id;
                delete this.selected[i].approved;
                delete this.selected[i].unsuscribed_at;
        }
        // this.selected.forEach(child => {
        //     if (!child.approved) {
        //         delete child;
        //     } else {
        //         delete child.id;
        //     delete child.parent_id;
        //     delete child.unsuscribed_at;
        //     }
            
        // })
    },
}
</script>

<style lang="scss">
#container {
    display: flex;
    flex-direction: column;
    width:40%;
    margin: 11rem auto;
    padding: 2rem;
    border: 1px solid #f1f1f1;
    background: #fff;
    box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
    img {
      display: block;
      width: 20%;
      margin: auto;
    }
    table {
        width: 90%;
        margin: auto;
        border-collapse: collapse;
    }
    table, th, td {
        border: 1px solid black;
        padding: .3rem;
    }
    tr {
        height: 2rem;
    }
    a {
        width: 30%;
        padding: 1rem;
        margin: auto;
        margin-top: 1rem;
        text-decoration: none;
        background-color: #1b595c;
        border: 1px solid white;
        font-weight: bold;
        color: white;
        &.router-link-exact-active {
        color: #42b983;
        }
    }
    a:hover {
        background-color: #154a44;
        color: #fbc522;
        border: 1px solid #fbc522;
    }
}
</style>