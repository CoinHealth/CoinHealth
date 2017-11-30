<div class="new-chat-wrapper">
    <multi-select
        v-model="form.users"
        label="full_name"
        track-by="id"
        placeholder="Type to search"
        :options="users"
        :multiple="true"
        :searchable="true"
        :loading="searchLoading"
        :internal-search="false"
        :clear-on-select="false"
        :close-on-select="false"
        :limit="10"
        {{-- @select="processUsers" --}}
        @input="processUsers"
        @search-change="getUsers">
        <span slot="noResult">
            Oops! No users found. Consider changing the search query.
        </span>
        <template v-show="!userIsPatient" slot="option" scope="props">
            <div class="option__desc">
                <span class="option__title">
                    @{{ props.option.full_name }}
                </span>
                <span class="option__small">
                    - @{{ props.option.user_role }}
                </span>
            </div>
        </template>

    </multi-select>
    <transition name="popup" v-if="userIsPatient">
        <p class="helper-block" v-if="!usersHasRequiredRole">
            * A Provider must be included to start a new Care Team
        </p>
    </transition>
</div>
