<div ref="paneFiles"
    v-show="menuFile"
    class="col-md-8 col-xs-12 files-container floating floating-right">
    <div class="images-wrapper wrapper">
        <p class="header">Images</p>
        <transition-group name="popup">
            <file-preview v-for="attachment in attachmentsImages"
                :key="attachment.id"
                size="big"
                :file="attachment">
            </file-preview>
        </transition-group>
    </div>
    <div class="files-wrapper wrapper">
        <p class="header">Other Files</p>
        <transition-group name="popup">
            <file-preview v-for="attachment in attachmentsFiles"
                :key="attachment.id"
                :file="attachment">
            </file-preview>
        </transition-group>
    </div>
</div>
