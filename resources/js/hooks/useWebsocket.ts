import { onBeforeUnmount, onMounted } from "vue";

export function useWebsocket(channel: string, events: { [key: string]: (data: any) => void }) {
    const subbedChannel = Echo.channel(channel);

    onMounted(() => {
        for (const [event, callback] of Object.entries(events)) {
            subbedChannel.listen(event, callback);
        }
    })

    onBeforeUnmount(() => {
        for (const [event, callback] of Object.entries(events)) {
            subbedChannel.stopListening(event, callback);
        }
    })
}
