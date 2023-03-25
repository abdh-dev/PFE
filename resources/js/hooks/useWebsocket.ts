import { onMounted, onUnmounted } from "vue";

export function useWebsocket(channel: string, events: { [key: string]: (data: any) => void }, privateChannel = false) {
    let subbedChannel = Echo.channel(channel);
    if (privateChannel) {
        subbedChannel = Echo.private(channel);
    }

    onMounted(() => {
        for (const [event, callback] of Object.entries(events)) {
            subbedChannel.listen(event, callback);
        }
    })

    onUnmounted(() => {
        for (const [event, callback] of Object.entries(events)) {
            subbedChannel.stopListening(event, callback);
        }
    })
}
