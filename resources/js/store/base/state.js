

export const state = {

    is_first_load: true,

    endpoint: '',
    primaryKey: 'id',

    items: [],

    selected: {},

    status: Object.freeze({
        idle: 'idle',
        loading: 'loading',
        complete: 'complete',
        error: 'error',
    }),

    filters: null,

    pagination: {
        current_page: 1,
        last_page: 1,
        total_items: 0,
    }
}
