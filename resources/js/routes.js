import Home from './components/Home.vue';
import AddCampaign from './components/AddCampaign.vue';
import EditCampaign from './components/EditCampaign.vue';

export const routes = [{
        name: 'home',
        path: '/',
        component: Home
    },
    {
        name: 'add',
        path: '/add-campaign',
        component: AddCampaign
    },
    {
        name: 'edit',
        path: '/edit-campaign/:id',
        component: EditCampaign
    }
];
