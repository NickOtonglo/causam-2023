import { createRouter, createWebHistory } from 'vue-router'
import Articles from '../components/Articles'
import ArticleCreate from '../components/Article/Create'
import ArticleView from '../components/Article/View'
import ArticleEdit from '../components/Article/Edit'
import Tags from '../components/Tag/Index'
import TagEdit from '../components/Tag/Edit'
import TagArticles from '../components/Tag/Articles'
import Login from '../components/Auth/Login'
import AuthenticatedLayout from '../components/Authenticated'
import GuestLayout from '../components/Guest'

function auth(to, from, next) {
    if (JSON.parse(localStorage.getItem('loggedIn'))) {
        next()
        // console.log(JSON.parse(localStorage.getItem('loggedIn')))
    }

    else next('/login')
}

const routes = [
    {
        // path: '/',
        // redirect: { name: 'login' },
        component: GuestLayout,
        children: [
            {
                path: '/articles',
                name: 'articles',
                component: Articles,
                meta: {
                    name: 'Articles'
                }
            },
            {
                path: '/articles/:slug',
                name: 'article.view',
                component: ArticleView,
                meta: {
                    name: 'View Article'
                }
            },
            {
                path: '/tags/:name/articles',
                name: 'tag.articles',
                component: TagArticles,
                meta: {
                    name: 'Articles'
                }
            },
            {
                path: '/login',
                name: 'auth.login',
                component: Login,
                meta: {
                    name: 'Login'
                }
            }
        ]
    },
    {
        component: AuthenticatedLayout,
        beforeEnter: auth,
        children: [
            {
                path: '/articles/new',
                name: 'article.create',
                component: ArticleCreate,
                meta: {
                    name: 'Create Article'
                }
            },
            {
                path: '/articles/:slug/edit',
                name: 'article.edit',
                component: ArticleEdit,
                meta: {
                    name: 'Update Article'
                }
            },
            {
                path: '/tags',
                name: 'tags',
                component: Tags,
                meta: {
                    name: 'Tags'
                }
            },
            {
                path: '/tags/:name',
                name: 'tag.edit',
                component: TagEdit,
                meta: {
                    name: 'Update Tag'
                }
            },
        ]
    }
]

export default createRouter({
    history: createWebHistory(),
    routes
})
