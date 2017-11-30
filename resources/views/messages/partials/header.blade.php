<div class="col-md-12 left">
    <div class="conversation-wrapper">
        <h3>
            <div ref="menuList"
                @click.prevent="menuList = !menuList"
                :class="['btn-menus','menu-list','btn-link', 'newNotificationClass', 'button_container']"
                data-toggle="tooltip"
                title="Menu">
                <label>
                    <span class="top"></span>
                    <span class="middle"></span>
                    <span class="bottom"></span>
                </label>
            </div>
        </h3>
    </div>
    <div class="user-wrapper">
        <a :href="chatUrl" v-if="chat_id">
            <img :src="chatAvatar"
                v-if="chat.conversation.chat_type != 2"
                alt="" class="user-avatar">
            <h3 class="user-name">@{{ channelName }}</h3>
        </a>
    </div>
    <div class="file-header pull-right" v-if="chat_id">
        <h3>
            <a
                ref="menuFile"
                href="#"
                @click.prevent="menuFile = !menuFile"
                class="btn-menus menu-file btn-link"
                data-toggle="tooltip" title="Show Files">
                <i class="fa menu-caret fa-caret-left"></i>
                <i class="fa fa-files-o"></i>
            </a>
        </h3>
    </div>
    <div class="search-wrapper pull-right">
        <span class="search-icon">
            <i class="fa fa-search"></i>
        </span>
        <input
            type="text"
            placeholder="search files or messages.."
            v-model="form.inputSearch"
            class="search-input">
    </div>

</div>
