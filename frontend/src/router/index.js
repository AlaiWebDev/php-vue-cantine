import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import LoginView from '../views/LoginView'
import RegisterView from '../views/RegisterView'
import InboxView from '../views/InboxView'
import AddChildView from '../views/AddChildView'

const routes = [
  {
    path: '/:newMessage?',
    name: 'home',
    props: true,
    component: HomeView
  },
  {
    path: '/login',
    name: 'login',
    component: LoginView
  },
  {
    path: '/register',
    name: 'register',
    component: RegisterView
  },
  {
    path: '/inbox',
    name: 'inbox',
    component: InboxView
  },
  {
    path: '/addchild',
    name: 'addchild',
    component: AddChildView
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
