<template>
    <div class="signature-wrapper">
        <div class="modal fade" 
            id="signatureModal" 
            tabindex="-1" 
            role="dialog" 
            ref="modal"
            aria-labelledby="signatuureModelLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" 
                            class="close" 
                            data-dismiss="modal" 
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="signatuureModelLabel">
                            CareParrot Signature
                        </h4>
                    </div>
                    <div class="modal-body">
                        <p>Are you satisfied with your Signature ?</p>
                        <img ref="signaturePreview">
                        
                        <p class="small disclaimer">
                            <strong>Disclaimer: </strong>
                            By affixing your signature, you authorized your Primary Care Doctor to grant permissions to other doctors who may request for your medical records, until you advise CareParrot to revoke the said privilege. If you have any disabilities that prevents you from physically signing, you may have an authorized person or legal guardian sign in your behalf.
                        </p>
                    </div>
                    <div class="modal-footer">

                        <button type="button" 
                            @click="clear"
                            class="btn btn-default" 
                            data-dismiss="modal">
                            No
                        </button>
                        <button type="button"
                            @click="save" 
                            class="btn btn-primary">
                            Yes
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="m-signature-pad signature-pad">    
            <div class="m-signature-pad--body">
                <canvas ref="canvas" id="signaturepad"></canvas>
            </div>
            <div class="m-signature-pad--footer">
                <button type="button"
                    ref="btnClear"
                    @click="clear"
                    class="btn btn-sm btn-default">
                    Clear <i class="fa fa-times"></i>
                </button>
                <button type="button" 
                    data-toggle="tooltip"
                    title="Coming Soon"
                    ref="btnUpload" 
                    class="btn btn-info btn-sm">
                    Upload Existing  <i class="fa fa-file-image-o"></i>
                </button>
                <button type="button"
                    :disabled="isEmpty"
                    ref="btnSave"
                    @click="trySave"
                    class="btn btn-sm btn-primary">
                    Save <i class="fa fa-check"></i>
                </button>
            </div>
        </div>
    </div>
    
</template>
<script>
import SignaturePad from "signature_pad";
export default {
    props: {
        dotSize: {
            type: [Number, Function],
            default: 1,
        },
        minWidth: {
            type: Number,
            default: 0.5,
        },
        maxWidth: {
            type: Number,
            default: 2.5,
        },
        throttle: {
            type: Number,
            default: 16,
        },
        backgroundColor: {
            type: String,
            default: 'rgba(0,0,0,0)',
        },
        penColor: {
            type: String,
            default: 'black'
        },
        velocityFilterWeight: {
            type: Number,
            default:  0.7,
        },
        onBegin: {
            type: Function,
        },
        onEnd: {
            type: Function,
        },
    },
    data () {
        return {
            signaturePad: null,
        };
    },

    mounted () {
        this.prepareSignature();
        $(this.$refs.modal).on('shown.bs.modal', this.preview);
    },

    computed: {
        isEmpty () {
            return this.signaturePad ? this.signaturePad.isEmpty() : true;
        },

        previewSrc () {
            return this.signaturePad ? this.signaturePad.toDataURL() : '';
        }
    },

    methods: {
        prepareSignature () {
            let canvas = this.$refs.canvas;
            this.signaturePad = new SignaturePad(canvas, {
                dotSize: this.dotSize,
                minWidth: this.minWidth,
                maxWidth: this.maxWidth,
                throttle: this.throttle,
                backgroundColor: this.backgroundColor,
                penColor: this.penColor,
                velocityFilterWeight: this.velocityFilterWeight,
                onBegin: this.onBegin,
                onEnd: this.onEnd,
            });
        },

        upload () {

        },

        preview () {
            let srcData = this.signaturePad.toDataURL();
            this.$refs.signaturePreview.src = srcData;
        },

        save (e) {
            if (this.isEmpty) 
                    return;
            this.$emit('save',e,this.signaturePad.toDataURL());
        },

        trySave () {
            $(this.$refs.modal).modal('show');
        },

        clear () {
            this.signaturePad.clear();
        },
    }
}
</script>