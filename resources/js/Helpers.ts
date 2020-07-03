export const ensureIsIterable = (subject): any[] => {
    const value = subject || []
    return !Array.isArray(value) ? value.split(',') : value
}

export const ensureIsCsv = (subject): string => {
    return ensureIsIterable(subject).join(',')
}

export const rejectEmptyProperties = (subject: object): object => {
    Object.keys(subject)
        .forEach((key: string) => {
            if ([null, undefined, ''].includes(subject[key])) {
                delete subject[key]
            }
        })

    return subject
}

export const sleep = (milliseconds: number): Promise<any> => {
    return new Promise(resolve => setTimeout(resolve, milliseconds));
}
