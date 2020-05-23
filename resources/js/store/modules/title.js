const state = {
    title: 'Welcome'
};

const getters = {
    pageTile: state => {
        return state.title
    }
};

const actions = {
    setPageTitle({commit, state}, title) {
        commit('setTitle', title)
    }
}

const mutations = {
    setTitle(state, title) {
        state.title = title + ' | FClone';
        document.title = state.title;
    }
}

export default {
    state, getters, actions, mutations
}
