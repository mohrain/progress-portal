<template>
    <div>
        <div class="categories">
            <button v-for="category in postCategories" :key="category.id" @click="selectCategory(category.id)"
                :class="['category-button', selectedCategoryId === category.id ? 'selected' : '']">
                {{ category.name }}
            </button>
        </div>

        <ul class="posts-list">
            <li v-for="post in posts" :key="post.id" class="post-item">
                <a :href="`/posts/${post.slug}`" class="post-header">
                    <div class="post-details">
                        <div class="post-title" style="color: black;">{{ post.title }}</div>
                        <div class="post-date">{{ formatDate(post.created_at) }}</div>
                    </div>
                    <div>
                        <a class="read-more">
                            पढ्नुहोस् <i class="bi bi-chevron-double-right"></i>
                        </a>
                    </div>
                </a>
            </li>
            <li v-if="posts.length === 0" class="no-posts">
                कुनैपनि सूचना छैन !!!
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    props: {
        baseUrl: {
            type: String,
            required: true,
        },
    },
    data() {
        return {
            postCategories: [],
            selectedCategoryId: null,
            posts: [],
        };
    },
    mounted() {
        this.fetchCategories();
    },
    methods: {
        async fetchCategories() {
            const res = await fetch(`${this.baseUrl}`);
            this.postCategories = await res.json();
            if (this.postCategories.length > 0) {
                this.selectedCategoryId = this.postCategories[0].id;
                this.fetchPosts();
            }
        },
        async fetchPosts() {
            const res = await fetch(`api/posts?post_category_id=${this.selectedCategoryId}`);
            this.posts = await res.json();
        },
        selectCategory(id) {
            this.selectedCategoryId = id;
            this.fetchPosts();
        },
        getSelectedCategoryName() {
            const selected = this.postCategories.find(c => c.id === this.selectedCategoryId);
            return selected ? selected.name : 'सूचना';
        },
        formatDate(dateStr) {
            return new Date(dateStr).toLocaleDateString('ne-NP');
        },
    },
};
</script>


<style scoped lang="scss">
.categories {
    display: flex;
    gap: 0.5rem;
    margin-bottom: 1rem;
    justify-content: start;
    flex-wrap: wrap;
    background-color: #1c4267;
    padding: 10px;
}

.category-button {
    padding: 0.5rem 1rem;
    border-radius: 0.25rem;
    background-color: transparent;
    /* Default gray */
    color: #e5e7eb;
    cursor: pointer;
    border: none;
    transition: background-color 0.3s ease, color 0.3s ease;

    &.selected {
        background-color: #fff;
        // border: 2px solid #982121;
        /* Blue */
        color: #982121;
    }

    &:focus {
        outline: none;
    }
}

.posts-list {
    list-style-type: none;
    padding: 0;
    margin: 0;
    border-radius: 0.375rem;
    background-color: white;
    border: 1px solid #e5e7eb;
    divide-y: 1px solid #e5e7eb;

    .post-item {
        padding: 0.5rem;
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        border-bottom: 1px solid #d2d5dbc9;

        .post-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;


            .post-details {
                .post-title {
                    font-weight: 600;

                }

                .post-date {
                    font-size: 0.875rem;
                    color: #6b7280;
                }
            }

            .read-more {
                display: flex;
                align-items: center;
                gap: 0.25rem;
                color: #2563eb;
                text-decoration: none;

                &:hover {
                    text-decoration: underline;
                }
            }
        }
    }

    .no-posts {
        padding: 1rem;
        text-align: center;
        color: #6b7280;
    }
}
</style>