import { createRouter, createWebHistory } from 'vue-router'
import Articles from '../components/Articles'
import ArticleCreate from '../components/Article/Create'
import ArticleView from '../components/Article/View'
import ArticleEdit from '../components/Article/Edit'
import Tags from '../components/Tags/Index'
import TagEdit from '../components/Tags/Edit'
import TagArticles from '../components/Tags/Articles'

const routes = [
    {
        path: '/articles',
        name: 'articles',
        component: Articles,
        meta: {
            name: 'Articles'
        }
    },
    {
        path: '/articles/new',
        name: 'article.create',
        component: ArticleCreate,
        meta: {
            name: 'Create Article'
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
    {
        path: '/tags/:name/articles',
        name: 'tag.articles',
        component: TagArticles,
        meta: {
            name: 'Articles'
        }
    },
]

export default createRouter({
    history: createWebHistory(),
    routes
})
