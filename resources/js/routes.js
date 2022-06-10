import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);
import HomeComponent from './pages/HomeComponent';
import ContactsComponent from './pages/ContactsComponent';
import NotFoundComponent from './pages/NotFoundComponent';
import AboutUsComponent from './pages/AboutUsComponent';
import BlogComponent from './pages/BlogComponent';
import SinglePostComponent from './pages/SinglePostComponent';
import CategoriesComponent from './pages/CategoriesComponent';
import PostPerCategoriesComponent from './pages/PostPerCategoriesComponent';




const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: HomeComponent
        },
        {
            path: '/contacts',
            name: 'contacts',
            component: ContactsComponent
        },
        {
            path: '/about-us',
            name: 'about-us',
            component: AboutUsComponent
        },
        {
            path: '/blog',
            name: 'blog',
            component: BlogComponent
        },
        {
            path: '/blog/:slug',
            name: 'single-post',
            component: SinglePostComponent
        },
        {
            path: '/categories',
            name: 'categories',
            component: CategoriesComponent
        },
        {
            path: '/categories/:id',
            name: 'post-per-category',
            component: PostPerCategoriesComponent
        },
        {
            path: '/*',
            name: 'notFound',
            component: NotFoundComponent
        }
    ]
});

export default router;
